<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\User;

/**
* @SWG\Swagger(
*  basePath="/api",
*  schemes={"http"},
*  produces={"application/json"},
*  consumes={"application/json"},
*   @SWG\Info(
*    title="Documentação API - Modelo I",
*          description="Foi gerada uma documentação interativa OpenAPI para uma API RestFull desenvolvida utilizando o framework Laravel, usando algumas anotações de doctrine encima dos metodos básicos de um crud, e para gerar a documentação foi utilizano a biblioteca zircote/swagger-php.",
*          version="2.0",
*          @SWG\Contact(name="viniciusmonteiroarjonas@outlook.com"),
*          @SWG\License(name="Autor: Vinicius Monteiro Arjonas")
*   )
* )
*/
class UsuarioController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/usuarios",
     *      operationId="getListar",
     *      tags={"Gerenciamento usuários"},
     *      summary="Lista de usuários",
     *      description="Retorna uma lista de usuários cadastrados na aplicação.",
     *      @SWG\Response(
     *          response=200,
     *          description="Operação realizada com sucesso."
     *       ),
     *       @SWG\Response(response=400, description="Solicitação não encontrada.")
     *     )
     *
    */
    public function index()
    {
        return User::all();
    }

     /**
     * @SWG\POST(
     *     path="/usuarios",
     *     operationId="postCriar",
     *     tags={"Gerenciamento usuários"},
     *     summary="Novo usuário",
     *     description="Criar um novo usuário",
     *     @SWG\Parameter(
     *          name="body", in="body", required=true,
     *       @SWG\Schema(
     *          @SWG\Property( property="name", type="string" ),
     *          @SWG\Property( property="email", type="string", format="email"),
     *          @SWG\Property( property="password", type="string"),
     *       )
     *          ),
     *     @SWG\Response(response="201", description="Usuário criado com sucesso."),
     *     @SWG\Response(response=400, description="Erro ao persistir dados.")
     *     )
     * )
     * @param  UsuarioRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
            return User::create($request->all());
    }

    /**
     * @SWG\GET(
     *     path="/usuarios/{id}",
     *     operationId="getVisualizar",
     *     tags={"Gerenciamento usuários"},
     *     summary="Visualizar usuário",
     *     description="Listar apenas um usuário, passando o ID do mesmo como parametro na URL.",
     *     @SWG\Parameter(
     *          name="id", in="path", required=true, type="integer"
     *          ),
     *     @SWG\Response(response="200", description="Usuário encontrado."),
     *     @SWG\Response(response=400, description="Registro não encontrado.")
     * )
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }
   
      /**
     * * @SWG\PUT(
     *     path="/usuarios/{id}",
     *     operationId="putAtualizar",
     *     tags={"Gerenciamento usuários"},
     *     summary="Atualizar usuário",
     *     description="Atualizando usuários, informando alguns paramentros.",
     *     @SWG\Parameter(
     *          name="id", in="path", required=true, type="integer"
     *          ),
     *     @SWG\Parameter(
     *          name="body", in="body", required=true,
     *       @SWG\Schema(
     *          @SWG\Property( property="name", type="string" ),
     *          @SWG\Property( property="email", type="string", format="email"),
     *          @SWG\Property( property="password", type="string"),
     *       )
     *          ),
     *     @SWG\Response(response="201", description="Usuário atualizado com sucesso"),
     *     @SWG\Response(response=400, description="Não foi possível atualizar o usuário.")
     * )
     * @param  UsuarioRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->update($request->all());
    }

     /**
     *  @SWG\DELETE(
     *     path="/usuarios/{id}",
     *     operationId="deleteRemover",
     *     tags={"Gerenciamento usuários"},
     *     summary="Remover usuário",
     *     description="Excluir usuário",
     *     @SWG\Parameter(
     *          name="id", in="path", required=true, type="integer"
     *     ),
     *     @SWG\Response(response="204", description="No content")
     * )
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
    }
}
