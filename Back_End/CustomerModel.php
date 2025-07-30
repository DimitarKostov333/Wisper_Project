<?php
// Customer.php

class CustomerModel {
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $address_line_one;
    public $address_line_two;
    public $city;
    public $state;
    public $zip;
    public $status;

    public function __construct($first_name, $last_name, $phone, $email, $address_line_one, $address_line_two, $city, $state, $zip, $status) 
    {
        $this->first_name = ucfirst(strtolower($first_name));
        $this->last_name = ucfirst(strtolower($last_name));
        $this->phone = $this->formatPhone($phone);
        $this->email = $email;
        $this->address_line_one = $address_line_one;
        $this->address_line_two = $address_line_two;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->status = $status;
    }

    // Transform db data into easily readable array
    public function toArray(): array 
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address_line_one' => $this->address_line_one,
            'address_line_two' => $this->address_line_two,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'status' => $this->status
        ];
    }

    private function formatPhone($phone): string 
    {
        $digits = preg_replace('/\D/', '', $phone);

        if (strlen($digits) === 10) {
            return sprintf('(%s) %s-%s', substr($digits, 0, 3), substr($digits, 3, 3), substr($digits, 6));
        }

        return $phone;
    }
}