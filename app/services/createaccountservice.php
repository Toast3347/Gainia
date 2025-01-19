<?php
require __DIR__ . '/../repositories/createaccountpository.php';
class CreateAccountService {
    public function insert($account) {
        // retrieve data
        $repository = new CreateAccountRepository();
        $repository->insert($account);        
    }
}
?>