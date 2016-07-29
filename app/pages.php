<?php

function go_to_all($pagename){
    $path = ROOT . "/ExamManager/views_all/".$pagename.".php";
    
    switch ($pagename) {
        
        case 'login':
            return  $path;
            break;
        case 'logout':
            return  $path;
            break;

        case 'first_login':
            return  $path;
            break;

        default: //if no page is found show the error page
            return  ROOT . "/ExamManager/views_all/errorpage.php";
            break;
        }
    
}
function go_to_user($pagename){
    $path = ROOT . "/ExamManager/views_user/".$pagename.".php";
    
switch ($pagename) {
    case 'home':
        return  $path;
        break;
    
    case 'newexam':
        return  $path;
        break;
    
    case 'newpatient':
        return  $path;
        break;
    
    case 'exams':
        return  $path;
        break;
    
    case 'patientinfo':
        return  $path;
        break;
    
    case 'patients':
        return  $path;
        break;
        
    case 'edit-patient':
        return  $path;
        break;  

    case 'edit-exam':
        return  $path;
        break;

    case 'examinfo':
        return  $path;
        break;

    case 'exams':
        return  $path;
        break;

    case 'report':
        return  $path;
        break;

    case 'editreport':
        return  $path;
        break;
        
    case 'editreport':
        return  $path;
        break;

    default:
        return go_to_all($pagename);
        break;
    }
    
}

function go_to_admin($pagename){
    $path = ROOT . "/ExamManager/views_admin/" . $pagename . ".php";
    
switch ($pagename) {
    
    case 'home':
        return $path;
        break;        
    
    case 'users':
        return $path;
        break;
    
     case 'userinfo':
        return $path;
        break;  
    
    case 'edit_user':
        return $path;
        break;
    
    case 'newuser':
        return $path;
        break;

    case 'procedures':
        return $path;
        break;
    
    case 'edit_procedure':
        return $path;
        break;
    
    case 'newprocedure':
        return $path;
        break;

    case 'modalities':
        return $path;
        break; 
    
    case 'newmodality':
        return $path;
        break;
    
    case 'logs':
        return $path;
        break;
    
    default:
        return go_to_all($pagename);
        break;
    }
}

?>