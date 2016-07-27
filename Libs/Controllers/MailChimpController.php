<?php

namespace Manager\Libs\Controllers;

use Manager\Libs\Factories;

Class MailChimpController
{

    /**
     * Instance of the maillist object.
     * 
     * @var \MailList
     */
    private $mailList = Null;
    
    /**
     * Instance of the member object.
     * 
     * @var \Member
     */
    private $member = Null;
    
    public function __construct()
    {
        //create instance of the maillist object
        $this->mailList = \Manager\Libs\Factories\MailListFactory::create();
        
        //create instance of the member object
        $this->member = \Manager\Libs\Factories\MemberFactory::create();
    }
    
    /**
     * Method to execute the requirements: Create list, add member to list and update member to list.
     * 
     * @return void 
     */
    public function run()
    {
        //add List
        $list_id = $this->mailList->createList();
        
        //add member to list
        $member_id = $this->mailList->addMember($this->member, $list_id);
        
        //modify our member object
        $this->member->__set('email_type', 'text');
        
        //update member of list
        $this->mailList->updateMember($this->member, $list_id, $member_id);
    }
}