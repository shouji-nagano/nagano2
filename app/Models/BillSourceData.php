<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillSourceData extends Model
{
    use HasFactory;
 public $timestamps = false;

    
 protected $table = 'bill_source_data';
 

    protected $fillable = [
        'misc_billing_request_number',
        'misc_billing_request_date',
        'misc_billing_summary',
        'misc_billing_total_amount',
        'misc_billing_taxable_amount',
        'misc_billing_nontaxable_amount',
        'misc_billing_exempt_amount',
        'misc_billing_tax_amount',
        'misc_billing_request_total',
        'misc_billing_arrival_departure_date',
        'misc_billing_ship_name',
        'misc_billing_customs_clearance_date',
        'misc_billing_delivery_date',
        'misc_billing_ref_no',
        'misc_billing_invoice_no',
        'misc_billing_container_count',
        'misc_billing_item_name',
        'misc_billing_item_specification',
        'misc_billing_item_quantity',
        'misc_billing_item_unit',
        'misc_billing_item_unit_price',
        'misc_billing_item_amount',
        'misc_billing_item_tax_category',
        'misc_billing_item_remarks',
        'company_name',
        'company_address1',
        'company_bank_name1',
        'company_bank_branch1',
        'company_bank_account_type1',
        'company_bank_account_number1',
        'company_bank_name2',
        'company_bank_branch2',
        'company_bank_account_type2',
        'company_bank_account_number2',
        'company_office_name6',
        'company_office_phone6',
        'company_office_fax6',
        'client_code',
        'client_address1',
        'client_address2',
        'billing_client_name',
        'file_name',
        'uploaded_at',
    ];

    public function importedFile()
    {
        return $this->hasMany(ImportedFile::class);
    }

    // 他のリレーションや追加のメソッドをここに追加することができます
}
