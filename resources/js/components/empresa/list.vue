<template>
    <div class="element-wrapper">
        <div class="element-box">
        <h5 class="form-inline justify-content-sm-end">
            <button class="mr-2 mb-2 btn btn-success" @click="newModal"> Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
        </h5>
        <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nuit</th>
                        <th>Email</th>
                        <th>Telemovel</th>
                        <th>Data</th>
                        <th>Acções</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Nuit</th>
                        <th>Email</th>
                        <th>Telemovel</th>
                        <th>Data</th>
                        <th>Acções</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <tr v-for="empresa in empresas" :key="empresa.id">
                        <td>{{ empresa.nome }}</td>
                        <td>{{ empresa.nuit }}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telemovel1 }}</td>
                        <td>{{ empresa.created_at | myDate }}</td>
                        <td>
                            <a href="#" @click="editModal(empresa)">
                                <i class="os-icon os-icon-ui-49 blue"></i>
                            </a>
                            /
                            <a class="danger" href="#" @click="deleteEmpresa(empresa.id)">
                                <i class="os-icon os-icon-ui-15 red"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>

        <empresa-add></empresa-add>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                empresas: []
            }
        },
        methods: {
            editModal(empresa){
                Fire.$emit('editModalEmpresa');
                $('#addEmpresa').modal('show');
                Fire.$emit('editModalEmpresaFill', empresa);
            },
            newModal(){
                Fire.$emit('newModalEmpresa');
                $('#addEmpresa').modal('show');
            },
            deleteEmpresa(id){
                Fire.$emit('empresa-deleted', id);
            },
            loadEmpresas() {
                axios.get("api/empresas")
                    .then((res) => {
                        this.empresas = res.data
                    });
            }
        },
        created() {
            Fire.$on('empresa-added', data => {
                this.empresas.unshift(data);
                $('#addEmpresa').modal('hide');
            });
            Fire.$on('empresa-deleted-done', () => {
                this.loadEmpresas();
            });
            Fire.$on('empresa-updated', () => {
                $('#addEmpresa').modal('hide');
                this.loadEmpresas();
            });
        },
        mounted() {
            this.loadEmpresas();
            console.log('Component mounted.')
        }
    }
</script>
