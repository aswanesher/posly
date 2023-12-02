<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        DB::table('settings')->insert(
            array(
                'id' => 1,
                'email' => 'sysadmin@simseka.test',
                'currency_id' => 1,
                'client_id' => Null,
                'invoice_footer' => Null,
                'warehouse_id' => Null,
                'CompanyName' => 'Simseka',
                'CompanyPhone' => '6315996770',
                'CompanyAdress' => '3618 Abia Martin Drive',
                'footer' => 'Simseka - POS Sistem Informasi Seragam Kerjaku',
                'developed_by' => 'Inovasis Media',
                'app_name' => 'Simseka',
                'logo' => 'logo-default.svg',
                'default_sms_gateway' => 'twilio',
                'default_language' => 'en',
                'symbol_placement' => 'before',
            )

        );
    }
}
