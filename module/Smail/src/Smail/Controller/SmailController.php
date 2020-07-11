<?php
namespace Smail\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SmailController extends AbstractActionController {

    protected $smailTable;
    
    //landing page
    public function indexAction() {        
        $this->fetchmessages();        
        return new ViewModel(array(
            'mails' => $this->getSmailTable()->fetchAll(),
        ));
    }    

    //cron function to fetch messages
    public function fetchmessages() {
        set_time_limit(0);
//        try {
//            $mail = new \Zend\Mail\Storage\Pop3(array('host'     => 'pop.gmail.com',
//                                         'port'     => '995',
//                                         'ssl'      => 'TLS',
//                                         'user'     => 'harveyspect6o@gmail.com',
//                                         'password' => 'zwukybktspqnzwqk'));
//            
//            foreach($mail as $message){
//                $this->getSmailTable()->saveMail($message);
//            }
//        } catch (Exception $ex) {
//            
//        }
        return;
    }
    
    //function to delete a message
    public function deleteMessage($param) {        
        $id = (int) $this->params('id');        
//        try {
//            $mail = new \Zend\Mail\Storage\Pop3(array('host'     => 'pop.gmail.com',
//                                         'port'     => '995',
//                                         'ssl'      => 'TLS',
//                                         'user'     => 'harveyspect6o@gmail.com',
//                                         'password' => 'zwukybktspqnzwqk'));
//            
//            $mail->removeMessage($id);            
//        } catch (Exception $ex) {
//            
//        }
        return $this->redirect()->toRoute('smail');
    }
    
    //table connection
    public function getSmailTable() {
        if (!$this->smailTable) {
            $sm = $this->getServiceLocator();
            $this->smailTable = $sm->get('Smail\Model\SmailTable');
        }
        return $this->smailTable;
    }
}
