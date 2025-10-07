
<?php
function update_user_ctr($id, $name, $phone_number, $country, $city)
{
    $user = new User($id);
    return $user->updateUser($name, $phone_number, $country, $city);
}

require_once __DIR__ . '/../classes/user_class.php';



function register_user_ctr($name, $email, $password, $phone_number, $country, $city, $role)
{
    $user = new User();
    $id = $user->createUser($name, $email, $password, $phone_number, $country, $city, $role);
    if ($id) {
        return $id;
    }
    return false;
}

function get_user_by_email_ctr($email)
{
    $user = new User();
    return $user->getUserByEmail($email);
}