<?php

defined( 'ABSPATH' ) || die();

class GMB_Reviews {

    private $option_prefix;
    private $status_page_slug;
    private $status_page_base_url;

    private $api_client_id = 'DEFINE_HERE';
    private $api_client_secret = 'DEFINE_HERE';
    private $api_client;

    private $token_data;
    private $refresh_token;
    private $access_token;

    public function __construct() {
        $this->setup_variables();
        $this->setup_api_client();

        $this->prepare_token_data();
        $this->maybe_refresh_access_token();

        add_action( 'admin_menu', array( $this, 'register_status_page' ) );
        add_action( 'admin_init', array( $this, 'handle_status_page_actions' ) );
    }

    public function setup_variables() {
        $this->option_prefix = 'gmb_reviews_';
        $this->status_page_slug = 'gmb-reviews-status';
        $this->status_page_base_url = admin_url( 'options-general.php?page=' . $this->status_page_slug );
    }

    public function setup_api_client() {
        require_once get_template_directory() . '/inc/google-api-client/vendor/autoload.php';
        $this->client = new Google\Client();
        $this->client->setClientId( $this->api_client_id );
        $this->client->setClientSecret( $this->api_client_secret );
        $this->client->addScope( 'https://www.googleapis.com/auth/business.manage' );
        $this->client->setRedirectUri( $this->get_action_url( 'auth' ) );
        $this->client->setAccessType( 'offline' );
        $this->client->setApprovalPrompt( 'force' );
        $this->client->setIncludeGrantedScopes( true );
    }

    public function auth() {
        if( ! isset( $_GET['code'] ) ) {
            header( 'Location: ' . filter_var( $this->client->createAuthUrl(), FILTER_SANITIZE_URL ) );
        } else {
            $this->client->authenticate( $_GET['code'] );
            $token_data = (array) $this->client->getAccessToken();
            update_option( $this->option_prefix . 'token_data', $token_data );
            $this->prepare_token_data();
            $this->fetch_account_name();
            $this->redirect_to_base();
        }
    }

    public function unset_auth() {
        delete_option( $this->option_prefix . 'token_data' );
    }

    public function is_app_authenticated() {
        return empty( get_option( $this->option_prefix . 'token_data' ) ) ? false : true;;
    }

    public function prepare_token_data() {
        $token_data = get_option( $this->option_prefix . 'token_data' );
        if( empty( $token_data ) )
            return false;
        $this->token_data = $token_data;
        $this->refresh_token = $token_data['refresh_token'];
        $this->access_token = $token_data['access_token'];
        $this->client->setAccessToken( $this->access_token );
    }

    public function get_refresh_token() {
        return $this->refresh_token;
    }

    public function get_access_token() {
        return $this->access_token;
    }

    public function get_access_token_ttl() {
        return ( $this->token_data['created'] + $this->token_data['expires_in'] - time() );
    }

    public function maybe_refresh_access_token() {
        if( $this->is_app_authenticated() && $this->get_access_token_ttl() < 600 ) {
            $this->refresh_access_token();
            $this->prepare_token_data();
            return true;
        }
        return false;
    }

    public function refresh_access_token() {
        $this->client->fetchAccessTokenWithRefreshToken( $this->get_refresh_token() );
        $token_data = (array) $this->client->getAccessToken();
        update_option( $this->option_prefix . 'token_data', $token_data );
    }

    public function get_action_url( $action ) {
        return add_query_arg( 'action', $action, $this->status_page_base_url );
    }

    public function redirect_to_auth() {
        header( 'Location: ' . filter_var( get_action_url( 'auth' ), FILTER_SANITIZE_URL ) );
    }

    public function redirect_to_base() {
        header( 'Location: ' . filter_var( $this->status_page_base_url, FILTER_SANITIZE_URL ) );
    }

    public function curl( $url ) {
        $curler = curl_init();
        curl_setopt( $curler, CURLOPT_URL, $url );
        curl_setopt( $curler, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Bearer ' . $this->get_access_token() ) );
        curl_setopt( $curler, CURLOPT_RETURNTRANSFER, 1 );
        $curl_response = curl_exec( $curler );
        curl_close( $curler );
        return json_decode( $curl_response, true );
    }

    public function fetch_account_name() {
        $url = 'https://mybusinessaccountmanagement.googleapis.com/v1/accounts';
        $response = $this->curl( $url );
        $account_name = $response['accounts'][0]['name'];
        update_option( $this->option_prefix . 'account_name', $account_name );
    }

    public function get_account_name() {
        return get_option( $this->option_prefix . 'account_name' );
    }

    public function unset_account_name() {
        delete_option( $this->option_prefix . 'account_name' );
    }

    public function fetch_locations() {
        $account_name = $this->get_account_name();
        $url = "https://mybusinessbusinessinformation.googleapis.com/v1/$account_name/locations?readMask=title,name";
        $response = $this->curl( $url );
        $locations = $response['locations'];
        update_option( $this->option_prefix . 'locations', $locations );
    }

    public function get_locations() {
        return get_option( $this->option_prefix . 'locations' );
    }

    public function unset_locations() {
        delete_option( $this->option_prefix . 'locations' );
    }

    public function fetch_reviews_for_all_locations() {
        $locations = $this->get_locations();
        if( empty( $locations ) )
            return false;
        foreach( $locations as $location ) {
            $this->fetch_reviews_for_location( $location['name'] );
        }
    }

    public function fetch_reviews_for_location( $location_name ) {
        $account_name = $this->get_account_name();
        $url = "https://mybusiness.googleapis.com/v4/$account_name/$location_name/reviews";
        $response = $this->curl( $url );
        $db_reviews = get_option( $this->option_prefix . 'reviews' );
        $db_reviews[$location_name] = $response['reviews'];
        update_option( $this->option_prefix . 'reviews', $db_reviews );
    }

    public function get_reviews() {
        return get_option( $this->option_prefix . 'reviews' );
    }

    public function unset_reviews() {
        delete_option( $this->option_prefix . 'reviews' );
    }

    public function get_review_count( $reviews ) {
        return count( $reviews );
    }

    public function convert_rating( $star_rating ) {
        $map = array( 'ONE' => 1, 'TWO' => 2, 'THREE' => 3, 'FOUR' => 4, 'FIVE' => 5 );
        return $map[ $star_rating ];
    }

    public function get_average_rating( $reviews ) {
        $count = $this->get_review_count( $reviews );
        $rating_sum = 0;
        foreach( $reviews as $review ) {
            $rating_sum = $rating_sum + $this->convert_rating( $review['starRating'] );
        }
        return number_format( (float) ( $rating_sum / $count ), 1, ',', '' );
    }

    public function register_status_page() {
        add_options_page( 'GMB Reviews Status', 'GMB Reviews', 'manage_options', 'gmb-reviews-status', array( $this, 'render_status_page' ) );
    }

    public function handle_status_page_actions() {
        if( ! is_admin() )
            return false;
        if( ! current_user_can( 'manage_options' ) )
            return false;
        if( ! ( isset( $_GET['page'] ) && $this->status_page_slug == $_GET['page'] ) )
            return false;
        // We should be on our status page at this point
        if( ! $this->is_app_authenticated() && isset( $_GET['action'] ) && 'auth' == $_GET['action'] ) {
            $this->auth();
        }
        // unset_auth action
        if( $this->is_app_authenticated() && isset( $_GET['action'] ) && 'unset_auth' == $_GET['action'] ) {
            $this->unset_reviews();
            $this->unset_locations();
            $this->unset_account_name();
            $this->unset_auth();
            $this->redirect_to_base();
        }
        // refresh_access_token action
        if( $this->is_app_authenticated() && isset( $_GET['action'] ) && 'refresh_access_token' == $_GET['action'] ) {
            $this->refresh_access_token();
            $this->redirect_to_base();
        }
        // fetch_locations action
        if( $this->is_app_authenticated() && isset( $_GET['action'] ) && 'fetch_locations' == $_GET['action'] ) {
            $this->fetch_locations();
            $this->redirect_to_base();
        }
        // unset_locations action
        if( isset( $_GET['action'] ) && 'unset_locations' == $_GET['action'] ) {
            $this->unset_reviews();
            $this->unset_locations();
            $this->redirect_to_base();
        }
        // fetch_reviews action
        if( $this->is_app_authenticated() && isset( $_GET['action'] ) && 'fetch_reviews' == $_GET['action'] ) {
            $this->fetch_reviews_for_all_locations();
            $this->redirect_to_base();
        }
        // unset_reviews action
        if( isset( $_GET['action'] ) && 'unset_reviews' == $_GET['action'] ) {
            $this->unset_reviews();
            $this->redirect_to_base();
        }
    }

    public function render_status_page() {
        ?>
        <h2>GMB Reviews Status</h2>
        <?php if( ! $this->is_app_authenticated() ) { ?>
            <p>Authenticate the app with your Google account.</p>
            <p><a href="<?php echo $this->get_action_url( 'auth' ); ?>" class="button button-primary">Authenticate API</a></p>
        <?php } else { ?>
            <style>
                .form-table {
                    margin-bottom: 1em;
                }
                .form-table tr th,
                .form-table tr td {
                    padding: 5px 10px 5px 0;
                }
                .form-table tr th:first-of-type {
                    width: 30%;
                }
            </style>
            <table class="form-table" role="presentation">
                <tbody>
                <tr>
                    <th>Access token</th>
                    <td><?php echo substr( $this->get_access_token(), 0, 50 ); ?>...</td>
                </tr>
                <tr>
                    <th>Access token created</th>
                    <?php
                    $token_created_dt = new DateTime();
                    $token_created_dt->setTimezone( wp_timezone() );
                    $token_created_dt->setTimestamp( $this->token_data['created'] );
                    ?>
                    <td><?php echo $token_created_dt->format( 'Y-m-d H:i:s' ); ?></td>
                </tr>
                <tr>
                    <th>Access token expires</th>
                    <?php
                    $token_expires_dt = new DateTime();
                    $token_expires_dt->setTimezone( wp_timezone() );
                    $token_expires_dt->setTimestamp( $this->token_data['created'] + $this->token_data['expires_in'] );
                    ?>
                    <td><?php echo $token_expires_dt->format( 'Y-m-d H:i:s' ); ?></td>
                </tr>
                <tr>
                    <th>Access token TTL</th>
                    <td><?php echo date( 'H:i:s', $this->get_access_token_ttl() ); echo ' / ' . $this->get_access_token_ttl() . 's'; ?></td>
                </tr>
                </tbody>
            </table>
            <p>
                <a href="<?php echo $this->get_action_url( 'refresh_access_token' ); ?>" class="button button-primary">Refresh access token</a>
                <a href="<?php echo $this->get_action_url( 'unset_auth' ); ?>" class="button button-secondary">Unset authentication</a>
            </p>
            <h2>Locations</h2>
            <?php if( ! empty( $locations = $this->get_locations() ) ) { ?>
                <table class="form-table" role="presentation">
                    <thead>
                    <tr>
                        <th>location_name</th>
                        <th>location_title</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $locations as $location ) { ?>
                        <tr>
                            <td><?php echo $location['name']; ?></td>
                            <td><?php echo $location['title']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <p>
                <a href="<?php echo $this->get_action_url( 'fetch_locations' ); ?>" class="button button-primary">Fetch locations</a>
                <a href="<?php echo $this->get_action_url( 'unset_locations' ); ?>" class="button button-secondary">Unset locations</a>
            </p>
            <?php if( ! empty( $locations = $this->get_locations() ) ) { ?>
                <h2>Reviews</h2>
                <?php if( ! empty( $reviews = $this->get_reviews() ) ) { ?>
                    <table class="form-table" role="presentation">
                        <thead>
                        <tr>
                            <th>location_name</th>
                            <th>reviews</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach( $reviews as $location_name => $location_reviews ) { ?>
                            <tr>
                                <td><?php echo $location_name; ?></td>
                                <td><?php echo $this->get_review_count( $location_reviews ) . ' reviews / ⌀ ' . $this->get_average_rating( $location_reviews ); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <p>
                    <a href="<?php echo $this->get_action_url( 'fetch_reviews' ); ?>" class="button button-primary">Fetch reviews</a>
                    <a href="<?php echo $this->get_action_url( 'unset_reviews' ); ?>" class="button button-secondary">Unset reviews</a>
                </p>
            <?php } ?>
        <?php } ?>
        <?php
    }

}

$gmb_reviews = new GMB_Reviews();
