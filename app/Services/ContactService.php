<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    private $contacts;

    /**
     * LanguageService constructor.
     */
    public function __construct()
    {
        $this->contacts = Contact::all()->sortBy('viewed');
    }

    /**
     * @return mixed
     */
    public function getContactsNumber()
    {
        return $this->contacts->where('viewed', false)->count();
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        $this->contacts->splice(4);
        return $this->contacts->all();
    }

    /**
     * @return mixed
     */
    public function getAllContacts()
    {
        return $this->contacts;
    }
}
