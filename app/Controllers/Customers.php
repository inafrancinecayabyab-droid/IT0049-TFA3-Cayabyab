<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        return view('customers/index', ['title' => 'Customer Accounts', 'customers' => (new CustomerModel())->orderBy('id', 'DESC')->findAll()]);
    }

    public function new(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $model = new CustomerModel();
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost(['full_name', 'email', 'phone']);
            if ($this->validateData($data, $model->getValidationRules())) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $model->insert($data);
                return redirect()->to('/customers')->with('message', 'Customer added successfully.');
            }
        }
        return view('customers/form', ['title' => 'New Customer', 'customer' => null, 'errors' => $this->validator?->getErrors() ?? []]);
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $model = new CustomerModel();
        $customer = $model->find($id);
        if (!$customer) return redirect()->to('/customers')->with('error', 'Customer not found.');
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost(['full_name', 'email', 'phone']);
            if ($this->validateData($data, $model->getValidationRules())) {
                $model->update($id, $data);
                return redirect()->to('/customers')->with('message', 'Customer updated successfully.');
            }
        }
        return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer, 'errors' => $this->validator?->getErrors() ?? []]);
    }
}
