<template>
    <div class="container-fluid">

    <div class="row mt-5">

        <div class="col-3"> <h3>Itens</h3> </div>

        <div class="col-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquisar item" v-model="searchable">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" @click="searchProducts()"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="col-3">
            <!-- <button class="btn btn-primary"> Novo Item </button> -->
            <create-modal @creating="criar" class="offset-md-7"></create-modal>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-hovered mx-4">
            <thead>
                <tr class="row">
                    <th class="col-1">#</th>
                    <th class="col-4">Produto</th>
                    <th class="col-2">Valor</th>
                    <th class="col-2">Data de Cadastro</th>
                    <th class="col-3">Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr class="row" v-for="(p, index) in products" :key="index">
                    <td class="col-1">{{p.id}}</td>
                    <td class="col-4">{{p.produto}}</td>
                    <td class="col-2">{{p.valor}}</td>
                    <td class="col-2">{{p.dataCadastro}}</td>
                    <td class="col-3">
                        <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#seeModal" @click="getProduct(p.id)">Visualizar Produto</button>
                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editModal" @click="getProduct(p.id)">Editar</button>
                        <button type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#deleteModal" @click="getProduct(p.id)">Excluir</button>                        
                    </td>
                </tr>
            </tbody>
        </table>

        <seemodal :prod="prod"></seemodal>
        <editmodal @editing="editar" :prod="prod" :id="prod.id"></editmodal>
        <deletemodal @deleting="excluir" :id="prod.id"></deletemodal>
        
        <div class="mx-2">
            
        </div>
    </div>
</div>
</template>

<script>
    import CreateModal from './CreateModal.vue';
    import SeeModal from './SeeModal.vue';
    
    export default {
        components: { CreateModal, SeeModal },
        data () {
            return {
                products: [],
                prod: {},
                searchable: "",
            }
        },
        mounted() {
            this.getProducts();
        },
        methods: {
            getProducts () {
                axios.get('/getProducts').then(data => (
                    this.products = data.data
                ));
            },
            getProduct (id) {
                axios.get('/getProduct/' + id).then(data => {
                    this.prod = {
                        id: data.data.id,
                        produto: data.data.produto,
                        valor: data.data.valor / 100,
                        dataCadastro: data.data.dataCadastro
                    }
                });
            },
            searchProducts() {
                axios.post('/searchProducts', {params: this.searchable}).then(data => (
                    this.products = data.data
                ));
            },
            criar (payload) {
                axios.post('/create', payload).then(data => {
                    if(data.data == true) this.getProducts();
                });
            },
            editar (payload) {
                axios.put('/update/' + payload.id, payload.prod).then(data => {
                    if(data.data == true) {
                        this.getProducts()
                    }
                });
            },
            excluir (payload) {
                axios.delete('/delete/' + payload.id).then(data => {
                    if(data.data == true) {
                        this.getProducts()
                    }
                });
            }
        }
    }
</script>
