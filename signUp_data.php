<?php
interface check
{
    public function sign_up();
    public function get_id($tempArray);
}
class SignUp implements check
{
    public function sign_up()
    {
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $json = file_get_contents('register_data.json');
        $tempArray = json_decode($json, 1);
        $data['id'] = $this->get_id($tempArray);
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            foreach ($tempArray as $user) {
                if ($user['email'] == $_POST['email']) {
                    die("User of this email is already exists");
                }
            }
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            file_put_contents('register_data.json', $jsonData);
        } else {
            die("Please fill all the fields");
        }
        header("Location:view_all_users.php");
        die();
    }
    public function get_id($tempArray)
    {
        $max = 0;
        foreach ($tempArray as $user) {
            if ($max < $user['id']) {
                $max = $user['id'];
            }
        }
        $max++;
        return $max;
    }
}

$sign_up = new SignUp();
$sign_up->sign_up();
