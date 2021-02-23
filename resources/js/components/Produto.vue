<template>
  <div>
    <h1 class="text-center">Cadastrar Estoque</h1>
    <hr />

    <!-- Button to Open the Modal -->
<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4">
  Novo Registro
</button>

<!-- The Modal -->
<div class="modal" :class="{mostrar:modal}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="fecharModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="my-4">
          <label for="id">Codigo do Estoque</label>
          <input v-model="produto.id" type="text" class="form-control" id="id" placeholder="Nome do produto"> 
        </div>
        <div class="my-4">
          <label for="nome">Nome</label>
          <input v-model="produto.nome" type="text" class="form-control" id="nome" placeholder="Nome do produto"> 
        </div>
        <div class="my-4">
          <label for="descricao">Descrição</label>
          <input v-model="produto.descricao" type="text" class="form-control" id="descricao" placeholder="Informe a descrição"> 
        </div>
        <div class="my-4">
          <label for="Uni_Medida">Uni_Medida</label>
          <input v-model="produto.uni_medida" type="text" class="form-control" id="Uni_Medida" placeholder="Nome a uni_medida"> 
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button @click="fecharModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button @click="salvar();" type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
      </div>

    </div>
  </div>
</div>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Uni_Medida</th>
          <th scope="col" colspan="2" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="art in produto" :key="art.ID_produto">
          <th scope="row">{{art.ID_produto}}</th>
          <td>{{ art.id }}</td>
          <td>{{ art.nome }}</td>
          <td>{{ art.descricao }}</td>
          <td>{{ art.Uni_Medida }}</td>
          <td>
              <button @click="modificar=true; abrirModal(art);" class="btn btn-warning">Editar</button>
          </td>
          <td>
              <button @click="deletar(art.id)" class="btn btn-danger">Remover</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      produto:{
        id:'12',
        nome:'',
        descricao:'',
        Uni_Medida:'',

      },

      ID_produto:0,
      modificar:true,
      modal:0,
      tituloModal:'',
      produto: [],
    }
  },
  methods: {
    async listar() {
      const res = await axios.get("/produto");
      this.produto = res.data;
    },
    async deletar(ID_produto) {
      const res = await axios.delete("/produto/"+ID_produto);
      this.listar();
    },

    async salvar() {
      if(this.modificar){
        const res = await axios.psot("/produto"+ this.ID_produto, this.produto);
        console.log(res);
      }else{
        const res = await axios.post("/produto", this.produto);
      }
      this.fecharModal();
      this.listar();
    },

     abrirModal(data={}) {
      this.modal=1;      
      if(this.modificar){
        this.ID_produto=data.ID_produto;
        this.tituloModal="Alterar Produto";
        this.produto.id=data.id;
        this.produto.nome=data.nome;
        this.produto.descricao=data.descricao;
        this.produto.uni_medida=data.Uni_Medida;
        
    }else{
        this.ID_produto=0;
        this.tituloModal="Salvar Produto";
        this.produto.id='';
        this.produto.nome='';
        this.produto.descricao='';
        this.produto.Uni_Medida='';
      }
    },
    
    fecharModal() {
      this.modal = 0;
    },
  },
    created() {
    this.listar();
  },

}
</script>
<style>
.mostrar {
  display: list-item;
  opacity: 1;
  background: rgb(44, 33, 75, 0.849);
}
</style>