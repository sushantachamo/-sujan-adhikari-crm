<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Application;
use App\Models\Admin\LoanDetails;
use App\Models\Admin\GuarantorDetails;
use App\Models\Admin\SanchiDetails;
use App\Models\Admin\OtherDetails;
use Illuminate\Support\Facades\DB;

class AddNewFieldsToApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // DB::beginTransaction();
        // $all_records = Application::get();
        // $new_data = [];
        // foreach($all_records as $key=>$records)
        // {

        //     foreach(config('fields') as $name=>$fields)
        //     {
        //         if($name != 'applicant_details' )
        //         {
        //             $new_data[$name]['application_id'] = $records->id;
        //             foreach($fields as $key=>$field)
        //             {
        //                 $new_data[$name][$key] = $records[$key];
        //             }
        //             if($name == 'loan_details')
        //             {
        //                 LoanDetails::create($new_data[$name]);
        //             }
        //             elseif($name == 'guarantor_details')
        //             {
        //                 GuarantorDetails::create($new_data[$name]);
        //             }
        //             elseif($name == 'sanchi_details')
        //             {
        //                 SanchiDetails::create($new_data[$name]);
        //             }
        //             elseif($name == 'other_details')
        //             {
        //                 OtherDetails::create($new_data[$name]);
        //             }
        //             else
        //             {

        //             }
                    
        //         }
        //     }
            
        // }
        // DB::commit();



        $columns = Schema::getColumnListing('applications');
        $allfields  = config('fields.applicant_details');
        $new_fields  = [];
        $not_in_config  = [];
        foreach($allfields as $key=>$field)
        {
            if(!Schema::hasColumn('applications', $field['key']))
            {
                $new_fields[$field['key']] = $field;
            }
            $all_fields[$key]=$field;
        }
        foreach($columns as $key=>$value)
        {
            if(!in_array($value, array_keys($all_fields)))
            {
                $not_in_config[$value]= $value;
            }
        }
        unset($not_in_config['id']);
        unset($not_in_config['application_id']);
        unset($not_in_config['loan_type']);
        unset($not_in_config['user_id']);
        unset($not_in_config['office_id']);
        unset($not_in_config['status']);
        unset($not_in_config['latest_status_id']);
        unset($not_in_config['latest_status_code']);
        unset($not_in_config['deleted_at']);
        unset($not_in_config['created_at']);
        unset($not_in_config['updated_at']);


        Schema::table('applications', function (Blueprint $table) use($new_fields) {

            foreach($new_fields as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable()->after('office_id');
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable()->after('office_id');
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable()->after('office_id');
                else
                    $table->text($key)->nullable()->after('office_id');
            }
        });

        Schema::table('applications', function (Blueprint $table) use($not_in_config) {
            foreach($not_in_config as $unused)
            {
                $table->dropColumn($unused);
            }
        });


        $columns_loan_details = Schema::getColumnListing('loan_details');
        $allfields_loan_details  = config('fields.loan_details');
        $new_fields_loan_details  = [];
        $not_in_config_loan_details  = [];
        foreach($allfields_loan_details as $key=>$field)
        {
            if(!Schema::hasColumn('loan_details', $field['key']))
            {
                $new_fields_loan_details[$field['key']] = $field;
            }
            $all_fields_loan_details[$key]=$field;
        }
        foreach($columns_loan_details as $key=>$value)
        {
            if(!in_array($value, array_keys($all_fields_loan_details)))
            {
                $not_in_config_loan_details[$value]= $value;
            }
        }
        unset($not_in_config_loan_details['id']);
        unset($not_in_config_loan_details['application_id']);
        

        Schema::table('loan_details', function (Blueprint $table) use($new_fields_loan_details) {
            foreach($new_fields_loan_details as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable()->after('application_id');
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable()->after('application_id');
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable()->after('application_id');
                else
                    $table->text($key)->nullable()->after('application_id');
            }
        });

        Schema::table('loan_details', function (Blueprint $table) use($not_in_config_loan_details) {
            foreach($not_in_config_loan_details as $unused)
            {
                $table->dropColumn($unused);
            }
        });

        $columns_guarantor_details = Schema::getColumnListing('guarantor_details');
        $allfields_guarantor_details  = config('fields.guarantor_details');
        $new_fields_guarantor_details  = [];
        $not_in_config_guarantor_details  = [];
        foreach($allfields_guarantor_details as $key=>$field)
        {
            if(!Schema::hasColumn('guarantor_details', $field['key']))
            {
                $new_fields_guarantor_details[$field['key']] = $field;
            }
            $all_fields_guarantor_details[$key]=$field;
        }
        foreach($columns_guarantor_details as $key=>$value)
        {
            if(!in_array($value, array_keys($all_fields_guarantor_details)))
            {
                $not_in_config_guarantor_details[$value]= $value;
            }
        }
        unset($not_in_config_guarantor_details['id']);
        unset($not_in_config_guarantor_details['application_id']);

        Schema::table('guarantor_details', function (Blueprint $table) use($new_fields_guarantor_details) {
            foreach($new_fields_guarantor_details as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable()->after('application_id');
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable()->after('application_id');
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable()->after('application_id');
                else
                    $table->text($key)->nullable()->after('application_id');
            }
        });

        Schema::table('guarantor_details', function (Blueprint $table) use($not_in_config_guarantor_details) {
            foreach($not_in_config_guarantor_details as $unused)
            {
                $table->dropColumn($unused);
            }
        });

        $columns_sanchi_details = Schema::getColumnListing('sanchi_details');
        $allfields_sanchi_details  = config('fields.sanchi_details');
        $new_fields_sanchi_details  = [];
        $not_in_config_sanchi_details  = [];
        foreach($allfields_sanchi_details as $key=>$field)
        {
            if(!Schema::hasColumn('sanchi_details', $field['key']))
            {
                $new_fields_sanchi_details[$field['key']] = $field;
            }
            $all_fields_sanchi_details[$key]=$field;
        }
        foreach($columns_sanchi_details as $key=>$value)
        {
            if(!in_array($value, array_keys($all_fields_sanchi_details)))
            {
                $not_in_config_sanchi_details[$value]= $value;
            }
        }
        unset($not_in_config_sanchi_details['id']);
        unset($not_in_config_sanchi_details['application_id']);

        Schema::table('sanchi_details', function (Blueprint $table) use($new_fields_sanchi_details) {
            foreach($new_fields_sanchi_details as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable()->after('application_id');
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable()->after('application_id');
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable()->after('application_id');
                else
                    $table->text($key)->nullable()->after('application_id');
            }
        });

        Schema::table('sanchi_details', function (Blueprint $table) use($not_in_config_sanchi_details) {
            foreach($not_in_config_sanchi_details as $unused)
            {
                $table->dropColumn($unused);
            }
        });


        $columns_other_details = Schema::getColumnListing('other_details');
        $allfields_other_details  = config('fields.other_details');
        $new_fields_other_details  = [];
        $not_in_config_other_details  = [];
        foreach($allfields_other_details as $key=>$field)
        {
            if(!Schema::hasColumn('other_details', $field['key']))
            {
                $new_fields_other_details[$field['key']] = $field;
            }
            $all_fields_other_details[$key]=$field;
        }
        foreach($columns_other_details as $key=>$value)
        {
            if(!in_array($value, array_keys($all_fields_other_details)))
            {
                $not_in_config_other_details[$value]= $value;
            }
        }
        unset($not_in_config_other_details['id']);
        unset($not_in_config_other_details['application_id']);


        Schema::table('other_details', function (Blueprint $table) use($new_fields_other_details) {
            foreach($new_fields_other_details as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable()->after('application_id');
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable()->after('application_id');
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable()->after('application_id');
                else
                    $table->text($key)->nullable()->after('application_id');
            }
        });

        Schema::table('other_details', function (Blueprint $table) use($not_in_config_other_details) {
            foreach($not_in_config_other_details as $unused)
            {
                $table->dropColumn($unused);
            }
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
