<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddRoleRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::create([
            'role' => 'usuario_padrao',
            'descricao' => 'Usuário comum que pode ler posts públicos'
        ]);

        Schema::table('users', function(Blueprint $table) use ($role) {
            $table->unsignedBigInteger('role_id')->default($role->id);

            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
}
