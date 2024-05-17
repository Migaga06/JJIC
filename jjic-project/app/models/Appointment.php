<?php

class Appointment extends Model
{
    protected $allowedColumns = [
        'user_id',
        'firstname',
        'lastname',
        'appoint_reason',
        'appoint_date',
        'contact',
        'email',
        'appoint_additional',
        'appoint_status'
    ];

    protected $beforeInsert = [
        'make_appoint_id',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['firstname'])) {
        $this->errors['firstname'] = "First name is required.";
        }

        if (empty($data['lastname'])) {
        $this->errors['lastname'] = "Last name is required.";
        }

        if (empty($data['appoint_reason'])) {
            $this->errors['appoint_reason'] = "Appointment Reason is required.";
        }

        if (empty($data['contact'])) {
            $this->errors['contact'] = "Contact Number is required.";
        }

        if (empty($data['email'])) {
        $this->errors['email'] = "Email is required.";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $this->errors['email'] = "Email is not valid.";
        }

        if (count($this->errors) == 0) {
        return true;
        } else {
        return false;
        }
    }

    public function make_appoint_id($data){
        $data['appoint_id'] = random_string(60);
        return $data;
    }

    public function insertAppoint($data){
        $appoint = new Appointment();
        $appoint->insert($data);
    }
}