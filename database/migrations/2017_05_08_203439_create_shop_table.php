<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('image', 3000)->default('data:image/gif;base64,R0lGODlhZABkALMAANfX18jIyIuLi7m6upSUlKCgoPX19fPz8+rq6uHh4a+vr/n5+YGBgaanp6mqqvHx8SH5BAAAAAAALAAAAABkAGQAAAT/8MlJq7046827/2AojmRpnmiqrmzrvnAsz3Rt33iu73zv/8CgcEgsGo/IpHLJbDqf0Kh0Sq1ar9is9nroer+HrSdBLpsR4s0hoXC43+7GIJyeHAx4PLsBf8sXeXh0WQgAAYeHfXByiIcAD4NVBgAODXyKmJV9c5FSBwgKl5mjiwAGVpOiipZ+o3IGnVCpmQ0KAWQAA6qLA5CSALtxAwgLCAh4lJhyvlQHwKu9DwEKCgMJs33LsU/YpQa6lXwJB+C8zFPOwQoPCaqvAbvav+oPz3699vfnnvlv6/3v4vXa5qSbnwQPQsVpYKqcPoJN0kH7NMCNLYPC9kXBGCcApAQA/4gBUJhtYBWJygaERJAggCuTVDj6ucSK1gBYkkAFI6UswClUwCwJHUq0qNBhEKG0bMS0adNHSaGAmUoVDM46WLNq3coVD9cOYQ79pNDl6wQDCRgUWFDhE4KoRrrkkXDHK9m6OAOYehAIwZ+6kHDKDVMXLg2Wh95+OnSNAktDAMKQuWMoAEsBDAuZKjQO8bWlb3tMIiBAgFq0pEvv7dKgdGnLmBcEcD1AAQMBBAAUIOBMwC3SDPTixuxjEma/AkAxAJBAQAFfBhosB+AcAXHcZAoJUICmQHIAwZsXCLkbwYDlY3MYH7BggIAEBAjw9d54QQP5B3YDIOAAfABAaDHAXv9+8oE3zHbFxOcSejyst4ACycV3R2vHPGBfcg/sBl9/wZ0S4E0ZErCAf9YpsAB8zhWAVIPUsedeAt5JEF+FFz5gXQEIENBAWiYCkhZ7Buw2YngI3lhYD0O6yIB5DFQj4E8LOCCgdJYx0MADBAg4AGwEWGObAlne0iQsX1IT2g5ojWcAPMYMEN+KFrZGQAEBfELniPep6eaOMPKnEoz/fQImAR4BQQdOBhhzVZzvCRIYX5/cwdcxd4RhACAS/ISHoobSNUhZFCzgXYV02QEqJHR4YUdbhg3RHpxmZXBprLTWauutuOaq66689urrr8AGK+ywxBZr7LHIJqvsssw26+wDFREAADs=');
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
        Schema::dropIfExists('shop');
    }
}
