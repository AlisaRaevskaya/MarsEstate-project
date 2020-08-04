<?php
 public function authUser($request){
        
        $auth_data = $request->post();

        $result =$this->accountService->authUser($auth_data);
        $result= json_encode($result, JSON_UNESCAPED_UNICODE);

        if ($result === AccountService::AUTH_SUCCESS){
            $_SESSION['email'] = $auth_data['email'];
            $_SESSION['user_role'] = 'user';
        }
        return $this->ajaxResponse($result);//возвращает клиенту строчку 
    }


$_SESSION['user_role'] = 'admin';