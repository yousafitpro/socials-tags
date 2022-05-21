
export const apiCallLigiscan = (postData) => {
  const token = JSON.parse(
    localStorage.getItem("_application_name_user_detail_")
  ).access_token;
  const baseURL = JSON.parse(
    localStorage.getItem("_application_name_user_detail_")
  ).applicationservice_PATH;

  return (
    axios({
      baseURL: baseURL + "service/apigateway",
      method: "POST",
      headers: {
        Authorization: `bearer ${token}`,
      },
      data: postData,
    })
      .then((res) => {
        return res.data;
      })
      // .catch(error =>
      //    {

      //logout()

      .catch((err) => {
        if (err.response) {
          if (err.response.status == 401) {
            warnToaster("Sorry! Authentication Faild.");
            // logout();
          }
          if (err.response.status == 500) {
            warnToaster("Sorry! Internal Server Error.");
          }
          // client received an error response (5xx, 4xx)
        } else if (err.request) {
          // client never received a response, or request never left
        } else {
          // anything else
        }
      })
  );

  // })
};
