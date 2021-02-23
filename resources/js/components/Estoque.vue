<template>
  <div>
    <h1 class="text-center">Cadastrar Estoque</h1>
    <hr />

    <!-- Button to Open the Modal -->
    <button
      @click="
        modificar = false;
        abrirModal();
      "
      type="button"
      class="btn btn-primary my-4"
    >
      Novo Registro
    </button>

    <!-- The Modal -->
    <div class="modal" :class="{ mostrar: modal }">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">{{ tituloModal }}</h4>
            <button
              @click="fecharModal()"
              type="button"
              class="close"
              data-dismiss="modal"
            >
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="my-4">
              <label for="quantidade">Quantidade</label>
              <input
                v-model="estoque.quantidade"
                type="text"
                class="form-control"
                id="quantidade"
                placeholder="Informe a Quantidade"
              />
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              @click="fecharModal()"
              type="button"
              class="btn btn-secundary"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <button
              @click="salvar()"
              type="button"
              class="btn btn-success"
              data-dismiss="modal"
            >
              Salvar
            </button>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Quantidade</th>
          <th scope="col" colspan="2" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="est in estoque" :key="est.id">
          <th scope="row">{{ est.id }}</th>
          <td>{{ est.quantidade }}</td>
          <td>
            <button
              @click="
                modificar = true;
                abrirModal(est.id);
              "
              class="btn btn-warning"
            >
              Editar
            </button>
          </td>
          <td>
            <button @click="remover(est.id)" class="btn btn-danger">
              Remover
            </button>
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
      estoque: {
        quantidade: "",
      },

      id: 0,
      modificar: true,
      modal: 0,
      tituloModal: "",
      estoque: [],
    };
  },
  methods: {
    async listar() {
      const res = await axios.get("/estoque/");
      this.estoque = res.data;
    },

    async remover(id) {
      const res = await axios.delete("/estoque/" + id);
      this.listar();
    },

    async salvar() {
      if (this.modificar) {
        //const res=await axios.put("/estoque" + this.id, this.estoque);
        //console.log(res);
      } else {
        const res = await axios.post("/estoque", this.estoque);
      }
      this.fecharModal();
      this.listar();
    },

    abrirModal(data = {}) {
      this.modal = 1;
      if (this.modificar) {
        this.id = data.id;
        this.tituloModal = "Modificar Estoque";
        this.estoque.quantidade = data.quantidade;
      } else {
        this.id = 0;
        this.tituloModal = "Criar Estoque";
        this.estoque.quantidade = "";
      }
    },
    fecharModal() {
      this.modal = 0;
    },
  },

  created() {
    this.listar();
  },
};
</script>
<style>
.mostrar {
  display: list-item;
  opacity: 1;
  background: rgb(44, 33, 75, 0.849);
}
</style>