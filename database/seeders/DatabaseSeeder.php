<?php

namespace Database\Seeders;

use App\Models\official;
use App\Models\role;
use App\Models\state;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->fname="Muhammad";
        $user->lname="Yousaf";
        $user->phone="+923417414093";
        $user->type="supper-admin";
        $user->status="1";
        $user->address="here will be the address";
        $user->email="yousaf.itpro@gmail.com";
        $user->password=bcrypt('12');
        $user->profile_image="1.png";
        $user->save();

        $user=new User();
        $user->fname="Muhammad";
        $user->lname="Yousaf";
        $user->phone="+923417414093";
        $user->type="user";
        $user->status="1";
        $user->address="here will be the address";
        $user->email="user@gmail.com";
        $user->password=bcrypt('12');
        $user->profile_image="1.png";
        $user->save();

        $role=new role();
        $role->user_id="1";
        $role->name="User";
        $role->save();

        $s=new state();
        $s->state_id=20;
        $s->state_abbr="US";
        $s->state_name="US Congress";
        $s->save();

        $s=new state();
        $s->state_id=20;
        $s->state_abbr="AZ";
        $s->state_name="Arizona";
        $s->save();
        $o=new official();
        $o->user_id=1;
        $o->email="yousaf.temp@gmail.com";
        $o->name="Yousaf";
        $o->image="https://as1.ftcdn.net/jpg/02/11/65/10/220_F_211651043_dwEPQfpE3acdwhaq0BwZ9xLLBEO3PQRs.jpg";
        $o->save();

    }
}
