<?php
function CheckSuccess($status){
    if($status =='Success'){
        echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                <b>Congratulations!</b> You have successfully submitted your request!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
}

function Success(){
    echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <b>Congratulations!</b> You have successfully registered a new Student Records Assistant!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
function loginError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid username/Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
function curpassError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid Current Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }

function pError($error){
    echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <b>Error!</b> '.$error.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

function vald(){
     if(Input::exists()){
      if(Token::check(Input::get('Token'))){
         if(!empty($_POST['College'])){
             $_POST['College'] = implode(',',Input::get('College'));
         }else{
            $_POST['College'] ="";
         }
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true'
            ),
            'College'=>array(
                'required'=>'true')
        ));

            if($validate->passed()){
                $user = new user();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username'=>Input::get('username'),
                        'password'=>Hash::make(Input::get('password'),$salt),
                        'salt'=>$salt,
                        'name'=> Input::get('fullName'),
                        'joined'=>date('Y-m-d H:i:s'),
                        'groups'=>1,
                        'colleges'=> Input::get('College'),
                        'email'=> Input::get('email'),
                    ));

                    // $user->createC(array(
                    //     'checker'=> Input::get('fullName'),

                    // ));
                    // $user->createV(array(
                    //     'verifier'=> Input::get('fullName'),
                    // ));

                    // $user->createR(array(
                    //     'releasedby'=> Input::get('fullName'),

                    // ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }

                Success();
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
            }
        }
            }else{
                return false;
            }
        }

        function logd(){
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST,array(
                        'username' => array('required'=>true),
                        'password'=> array('required'=>true)
                    ));
                    if($validation->passed()){
                        $user = new user();
                        $remember = (Input::get('remember') ==='on') ? true :false;
                        $login = $user->login(Input::get('username'),Input::get('password'),$remember);
                        if($login){
                            if($user->data()->groups == 1){
                                 Redirect::to('registrar.php');
                                echo $user->data()->groups;
                            }else if($user->data()->groups == 2){
                                 Redirect::to('registrar.php');
                                echo $user->data()->groups;
                            }
                            else{
                                Redirect::to('index.php');
                               echo $user->data()->groups;
                            }
                        }else{
                            loginError();
                        }
                    }else{
                        foreach($validation->errors() as $error){
                            echo $error.'<br />';
                        }
                    }
                }
            }
        }

        function isLogin(){
            $user = new user();
            if(!$user->isLoggedIn()){
                Redirect::to('adminlogin.php');
            }
        }

function profilePic(){
    $view = new view();
    if($view->getdpSRA()!=="" || $view->getdpSRA()!==NULL){
        echo "<img class='rounded-circle profpic img-thumbnail ml-3' alt='100x100' src='data:".$view->getMmSRA().";base64,".base64_encode($view->getdpSRA())."'/>";
    }else{
        echo "<img class='rounded-circle profpic img-thumbnail' alt='100x100' src='resource/img/user.jpg'/>";
    }
}

function updateProfile(){
    if(Input::exists()){
        if(!empty($_POST['College'])){
            $_POST['College'] = implode(',',Input::get('College'));
        }else{
           $_POST['College'] ="";
        }

        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true',
                'min'=>5,
                'max'=>50,
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();

                try {
                    $user->update(array(
                        'username'=>Input::get('username'),
                        'name'=> Input::get('fullName'),
                        'colleges'=> Input::get('College'),
                        'email'=> Input::get('email')
                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                Redirect::to('template.php');
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }

    }
}

function changeP(){
    if(Input::exists()){
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'password_current'=>array(
                'required'=>'true',
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            )));

            if($validate->passed()){
                $user = new user();
                if(Hash::make(Input::get('password_current'),$user->data()->salt) !== $user->data()->password){
                    curpassError();
                }else{
                    $user = new user();
                    $salt = Hash::salt(32);
                    try {
                        $user->update(array(
                            'password'=>Hash::make(Input::get('password'),$salt),
                            'salt'=>$salt
                        ));
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                    if($user->data()->groups == 2){
                        Redirect::to('registrar.php');
                        echo $user->data()->groups;
                    }else if($user->data()->groups == 3){
                        Redirect::to('dean.php');
                        echo $user->data()->groups;
                    }else if($user->data()->groups == 4){
                        Redirect::to('accounting.php');
                        echo $user->data()->groups;
                    }else if($user->data()->groups == 6){
                        Redirect::to('library.php');
                        echo $user->data()->groups;
                    }
                }
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
            }
        }
    }
}


function approveAccounting(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceAccounting()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveDepartment(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceDepartment()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveLibrary(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceLibrary()){
        } else{
            echo "Error in approving";
        }
    }
}

function approveRegistrar(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->approveClearanceRegistrar()){
        } else{
            echo "Error in approving";
        }
    }
}

function holdRegistrar(){
    if(isset($_POST['reset'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->resetHoldClearanceRegistrar();
    }
    elseif(!empty($_POST['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->holdClearanceRegistrar();
    }
}

function holdAccounting(){
    if(isset($_POST['reset'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->resetHoldClearanceAccounting();
    }
    elseif(!empty($_POST['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->holdClearanceAccounting();
    }
}

function holdDepartment(){
    if(isset($_POST['reset'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->resetHoldClearanceDepartment();
    }
    elseif(!empty($_POST['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->holdClearanceDepartment();
    }
}

function holdLibrary(){
    if(isset($_POST['reset'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->resetHoldClearanceLibrary();
    }
    elseif(!empty($_POST['hold']) && !empty($_POST['remarks'])){
        $hold = new hold($_POST['hold'],$_POST['remarks']);
        $hold->holdClearanceLibrary();
    }
}

function isAdmin($user){
    if($user === "1"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isRegistrar($user){
    if($user === "2" || $user === "1"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isDean($user){
    if($user === "3"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isAccounting($user){
    if($user === "4"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function isLibrary($user){
    if($user === "6"){

    }
    else{
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
}

function viewAccounting(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoAccounting()){
        }
    }
}
function viewLibrary(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoLibrary()){
        }
    }
}

function viewRegistrar(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoRegistrar()){
        }
    }
}
function viewDean(){
    if(!empty($_GET['id'])){
        $info = new info($_GET['id']);
        if($info->infoDean()){
        }
    }
}

function gradInfo(){
    if (Input::exists()) {
        if(!empty($_POST['studentNumber']) && !empty($_POST['lname'])){
            if(strlen(trim($_POST['lname'])) != 0){
                Redirect::to("viewGraduate.php?studentNumber=$_POST[studentNumber]&lname=$_POST[lname]");
            }
            else{
                echo "<br>";
                echo "<b><i>**Please enter an appropriate input";
            }
        }
        else{
            echo "<br>";
            echo "<b><i>**Please enter an appropriate input";
        }
    }
}

function sendmailLibrary(){
    $send = new sendMail();
    $send->sendLibrary();
}

function sendmailDean(){
    $send = new sendMail();
    $send->sendDean();
}
function sendmailAccounting(){
    $send = new sendMail();
    $send->sendAccounting();
}


function expireLibrary(){
    if(!empty($_GET['expire'])){
        $expire = new expire($_GET['expire']);
        if($expire->expiredLibrary()){
        } else{
            echo "Error in expiring";
        }
    }
}

function expireDean(){
    if(!empty($_GET['expire'])){
        $expire = new expire($_GET['expire']);
        if($expire->expiredDean()){
        } else{
            echo "Error in expiring";
        }
    }
}

function expireAccounting(){
    if(!empty($_GET['expire'])){
        $expire = new expire($_GET['expire']);
        if($expire->expiredAccounting()){
        } else{
            echo "Error in expiring";
        }
    }
}

function expireRegistrar(){
    if(!empty($_GET['expire'])){
        $expire = new expire($_GET['expire']);
        if($expire->expiredRegistrar()){
        } else{
            echo "Error in expiring";
        }
    }
}

function deptImage(){
    $user = new user();
    $username = $user->data()->username;

    if($username == "SAM"){
        echo "img-am.png";
    }elseif($username == "DENT"){
        echo "img-dmd.png";
    }elseif($username == "SELAMS"){
        echo "img-elams.png";
    }elseif($username == "GRADSCH"){
        echo "img-gs.png";
    }elseif($username == "MED"){
        echo "img-med.png";
    }elseif($username == "MEDTECH"){
        echo "img-mt.png";
    }elseif($username == "NURSING"){
        echo "img-nu.png";
    }elseif($username == "NHM"){
        echo "img-nhm.png";
    }elseif($username == "OPTO"){
        echo "img-od.png";
    }elseif($username == "PHARM"){
        echo "img-pharm.png";
    }elseif($username == "SCITECH"){
        echo "img-sc.png";
    }else{
        echo "img-ceu.png";
    }

}

function countManila(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT count(*) AS `count` from tbl_map_info WHERE `campus` = 'Manila' && `referenceID` LIKE 'A2023%'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC); 
            return $rows[0]['count'];
        }
function countMalolos(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT count(*) AS `count` from tbl_map_info WHERE `campus` = 'Malolos' && `referenceID` LIKE 'A2023%'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC); 
            return $rows[0]['count'];
        }
function countMakati(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT count(*) AS `count` from tbl_map_info WHERE `campus` = 'Makati' && `referenceID` LIKE 'A2023%'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_ASSOC); 
            return $rows[0]['count'];
        }
 ?>
