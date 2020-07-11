<?php

namespace Smail\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class SmailTable extends AbstractTableGateway
{
    protected $table = 'emails';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Smail());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getSmail($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveMail(Smail $smail)
    {
        $data = array(
            'email_id' => $smail->email_id,
            'content'  => $smail->content,
            'subject'  => $smail->subject,
            'attachments'  => $smail->attachments,
            'message_id'  => $smail->message_id,
        );

        $id = (int)$smail->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getSmail($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteSmail($id)
    {
        $this->delete(array('id' => $id));
    }

}
