<template>
    <div class="element-wrapper">
        <div class="element-box">
            <h5 class="form-inline justify-content-sm-end">
                <button class="mr-2 mb-2 btn btn-success" @click="newModal"> Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
            </h5>
            <div class="table-responsive">
                <table id="table-empresas" width="100%" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>{{ ('home.nome_titulo') }}</th>
                            <th>{{ ('home.nuit_titulo') }}</th>
                            <th>{{ ('home.email_titulo') }}</th>
                            <th>{{ ('home.telemovel_titulo') }}</th>
                            <th>{{ ('home.data_titulo') }}</th>
                            <th style="text-align:center">{{ ('home.acção_titulo') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empresa in empresas" :key="empresa.id">
                            <td>{{ empresa.nome }}</td>
                            <td>{{ empresa.nuit }}</td>
                            <td>{{ empresa.email }}</td>
                            <td>{{ empresa.telemovel1 }}</td>
                            <td>{{ empresa.created_at | myDate }}</td>
                            <td style="text-align:center">
                                <a class="edit" href="#" @click="editModal(empresa)">
                                    <i class="os-icon os-icon-ui-49"></i>
                                </a>
                                /
                                <a class="delete" href="#" @click="deleteEmpresa(empresa.id)">
                                    <i class="os-icon os-icon-ui-15"></i>
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
                dt: null,
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
            this.dt = $('#table-empresas').DataTable({
                "scrollY": "10px",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
            this.loadEmpresas();
        },
        watch: {
            empresas(val) {
                this.dt.destroy();
                this.$nextTick(() => {
                    this.dt = $('#table-empresas').DataTable({
                        "scrollY": "200px",
                        "scrollCollapse": true,
                    });
                    $('.dataTables_length').addClass('bs-select');
                });
            }
        },
    }
</script>
