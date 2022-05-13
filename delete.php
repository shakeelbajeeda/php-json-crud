<?php
interface delete_fun
{
    public function delete();
}
class Delete implements delete_fun
{
    private function  delete_record_array($users, $id)
    {
        $new_users = [];
        foreach ($users as $user) {
            if ($user['id'] != $id) {
                array_push($new_users, $user);
            }
        }
        return $new_users;
    }
    public function delete()
    {
        $id = $_GET['id'];
        $json = file_get_contents('register_data.json');
        $users = json_decode($json, 1);



        $users = $this->delete_record_array($users, $id);
        file_put_contents('register_data.json', json_encode($users));
        header("Location:view_all_users.php");
    }
}

$delete = new Delete();
$delete->delete();
