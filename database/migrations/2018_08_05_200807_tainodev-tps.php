<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TainodevTps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* In "php artisan migrate:refresh" coomand, we want to drop and re-create all tables */
        /* Then we can use "php artisan db:seed" command */
        $this->down();

        Schema::create("user",function($table)
        {
            $table->increments("user_id");
            $table->string("user_first_name",60)->nullable();
            $table->string("user_middle_name",60)->nullable();
            $table->string("user_last_name",60)->nullable();
            $table->string("user_username",60)->nullable();
            $table->string("user_password",128)->nullable();
            $table->string("user_phone_1",13)->nullable();
            $table->string("user_phone_2",13)->nullable();
            $table->string("user_address_1",240)->nullable();
            $table->string("user_address_2",240)->nullable();
            $table->string("user_company_name",60)->nullable();
            $table->string("user_company_phone_1",13)->nullable();
            $table->string("user_company_phone_2",13)->nullable();
            $table->string("user_company_address_1",240)->nullable();
            $table->string("user_company_address_2",240)->nullable();
            $table->string("user_pay_method_1",240)->nullable();
            $table->string("user_pay_method_2",240)->nullable();
            $table->dateTime("user_last_payment_datetime")->nullable();
            $table->float("user_last_payment_amount")->nullable();
            $table->integer("user_is_active")->default(1)->unsigned();
            $table->timestamps();
        });

        Schema::create("product",function($table)
        {
            $table->increments("product_id");
            $table->integer('product_user_id')->unsigned()->nullable();
            $table->string("product_number",240)->nullable();
            $table->string("product_barcode_number",240)->nullable();
            $table->string("product_name",240)->nullable();
            $table->string("product_short_description",240)->nullable();
            $table->text("product_long_description")->nullable();
            $table->float("product_cost")->default(0)->nullable();
            $table->float("product_price_1")->default(0)->nullable();
            $table->float("product_price_2")->default(0)->nullable();
            $table->float("product_price_3")->default(0)->nullable();
            $table->float("product_price_4")->default(0)->nullable();
            $table->float("product_price_5")->default(0)->nullable();
            $table->integer("product_is_active")->default(1)->unsigned();
            $table->timestamps();
        });

        Schema::create("order_header",function($table)
        {
            $table->increments("order_header_id");
            $table->integer('order_header_user_id')->unsigned()->nullable();
            $table->string("order_header_number",240)->nullable();
            $table->string("order_header_barcode_number",240)->nullable();
            $table->string("order_header_table_number",240)->nullable();
            $table->integer('order_header_waiter_id')->unsigned()->nullable();
            $table->string("order_header_waiter_name",240)->nullable();
            $table->string("order_header_waiter_code",240)->nullable();
            $table->dateTime("order_header_datetime")->nullable();
            $table->float("order_header_subtotal")->default(0)->nullable();
            $table->string("order_header_tax_total_used",240)->nullable();
            $table->float("order_header_tax_total")->default(0)->nullable();
            $table->float("order_header_total")->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create("order_detail",function($table)
        {
            $table->increments("order_detail_id");
            $table->string("order_detail_order_number",240)->nullable();
            $table->string("order_detail_product_number",240)->nullable();
            $table->string("order_detail_product_name",240)->nullable();
            $table->float("order_detail_product_price")->default(0)->nullable();
            $table->float("order_detail_product_offer")->default(0)->nullable();
            $table->integer("order_detail_product_quantity")->default(0)->nullable();
            $table->float("order_detail_product_total")->default(0)->nullable();
            $table->text("order_detail_product_comment")->nullable();
            $table->timestamps();
        });

        Schema::create("waiter",function($table)
        {
            $table->increments("waiter_id");
            $table->integer('waiter_user_id')->unsigned()->nullable();
            $table->string("waiter_name",240)->nullable();
            $table->string("waiter_code",240)->nullable();
            $table->timestamps();
        });

        Schema::create("setting",function($table)
        {
            $table->increments("setting_id");
            $table->integer('setting_user_id')->unsigned()->nullable();
            $table->string("setting_key",240)->nullable();
            $table->string("setting_value",240)->nullable();
            $table->timestamps();
        });

        Schema::create("user_billing",function($table)
        {
            $table->increments("user_billing_id");
            $table->integer('user_billing_user_id')->unsigned()->nullable();
            $table->dateTime("user_billing_payment_datetime")->nullable();
            $table->float("user_billing_payment_amount")->default(0)->nullable();
            $table->string("user_billing_payment_method",240)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = array(
            "user",
            "product",
            "order_header",
            "order_detail",
            "waiter",
            "setting",
            "user_billing",
        );

        foreach ($tables as $v) 
        {
            Schema::dropIfExists($v);
        }
    }
}
