<?php
interface update_fun
{
    public function update();
}
class Update implements update_fun
{
    private function find_index($users, $data)
    {
        foreach ($users as $key => $array) {
            if ($array['id'] == $data['id']) {
                return $key;
            }
        }
    }
    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $json = file_get_contents('register_data.json');
        $users = json_decode($json, 1);


        $index = $this->find_index($users, $data);
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $users[$index]['username'] = $data['username'];
            $users[$index]['email'] = $data['email'];
            $users[$index]['password'] = $data['password'];
            file_put_contents('register_data.json', json_encode($users));
        } else {
            die("Please fill all the fields");
        }

        header("Location:view_all_users.php");
    }
}

$update = new update();
$update->update();
