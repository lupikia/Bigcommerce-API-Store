<?php

/**
 * Created by IntelliJ IDEA.
 * User=>$data->,
 * Date=>$data->,
 * Time=>$data->,
 */
class PostGetFunctions extends Request
{
    private $request;
    private $request_type;

    public function PostGetFunctions(){

    }

    public function place_order($data){
        $this->request = new Request($this->request_type);
        $this->request->set_request_url("/v2/orders");

        $ship_email=$data->billing_address->email !=""?$data->billing_address->email:$data->billing_address->email;
        $reset_data  =array(
                       "status_id"=>$data->status_id,
                      "customer_id"=>$data->customer_id,
                      "billing_address"=>array(
                          "first_name"=>$data->billing_address->firstName,
                          "last_name"=>$data->billing_address->lastName,
                          "company"=>$data->billing_address->company,
                          "street_1"=>$data->billing_address->address1,
                          "city"=>$data->billing_address->city,
                          "state"=>$data->billing_address->stateOrProvince,
                          "zip"=>$data->billing_address->postalCode,
                          "country"=>$data->billing_address->country,
                          "country_iso2"=>$data->billing_address->countryCode,
                          "email"=>$data->billing_address->email,
                          "phone"=>$data->billing_address->phone
                      ),
                      "shipping_addresses"=>array(array(
                          "first_name"=>$data->shipping_addresses->firstName,
                          "last_name"=>$data->shipping_addresses->lastName,
                          "company"=>$data->shipping_addresses->company,
                          "street_1"=>$data->shipping_addresses->address1,
                          "city"=>$data->shipping_addresses->city,
                          "state"=>$data->shipping_addresses->stateOrProvince,
                          "zip"=>$data->shipping_addresses->postalCode,
                          "country"=>$data->shipping_addresses->country,
                          "country_iso2"=>$data->shipping_addresses->countryCode,
                          "email"=>$ship_email,
                          "phone"=>$data->shipping_addresses->phone
                        )),
                      "products"=>$data->products);

       echo json_encode($reset_data);

       echo json_encode( json_decode( $this->request->post_request($reset_data)));
    }

    public function set_post_type($type){
        $this->request_type= $type;
    }

    public function update_order_status(){


    }
}