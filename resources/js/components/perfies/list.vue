<template>
    <div class="element-wrapper">
        <div class="element-box">
            <h5 class="form-inline justify-content-sm-end">
                <button class="mr-2 mb-2 btn btn-success" @click="newModal"> Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
            </h5>
            <table id="table-perfil" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Nome</th>
                        <th class="th-sm">Permiccoes</th>
                        <th class="th-sm">Descricao</th>
                        <th class="th-sm">Data</th>
                        <th style="text-align:center" class="th-sm">Acções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="perfil in perfies" :key="perfil.id">
                        <td>{{ perfil.nome }}</td>
                        <td v-for="previlegio in perfil.previlegios" :key="previlegio.id">
                            {{ previlegio.nome }},
                        </td>
                        <td>{{ perfil.descricao }}</td>
                        <td>{{ perfil.created_at | myDate }}</td>
                        <td style="text-align:center">
                            <a class="edit" href="#" @click="editModal(perfil)">
                                <i class="os-icon os-icon-ui-49"></i>
                            </a>
                            /
                            <a class="delete" href="#" @click="deleteUser(perfil.id)">
                                <i class="os-icon os-icon-ui-15"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <perfil-add></perfil-add>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dt: null,
            perfies: []
        }
    },
    methods: {
        editModal(perfil){
            Fire.$emit('editModalPerfil');
            $('#addPerfil').modal('show');
            Fire.$emit('editModalPerfilFill', perfil);
        },
        newModal() {
            Fire.$emit('newModalPerfil');
            $('#addPerfil').modal('show');
        },
        deletePerfil(id){
            Fire.$emit('perfil-deleted', id);
        },
        loadPerfies() {
            axios.get("api/perfies")
            .then((res) => {
                this.perfies = res.data;
                console.log(this.perfies);
            });
        }
    },
    created() {
        Fire.$on('perfil-added', data => {
            this.perfies.unshift(data);
            $('#addPerfil').modal('hide');
        });
        Fire.$on('perfil-deleted-done', () => {
            this.loadPerfies();
        });
        Fire.$on('perfil-updated', () => {
            $('#addPerfil').modal('hide');
            this.loadPerfies();
        });
    },
    mounted() {
        this.dt = $('#table-perfil').DataTable({
            "scrollY": "50px",
            "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
        this.loadPerfies();
    },
    watch: {
        perfies(val) {
            this.dt.destroy();
            this.$nextTick(() => {
                this.dt = $('#table-perfil').DataTable({
                            "scrollY": "200px",
                            "scrollCollapse": true,
                        });
                $('.dataTables_length').addClass('bs-select');
            });
        }
    },
}
</script>
