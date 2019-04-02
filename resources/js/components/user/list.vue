<template>
    <div class="element-wrapper">
        <div class="element-box">
            <h5 class="form-inline justify-content-sm-end">
                <button class="mr-2 mb-2 btn btn-success" @click="newModal"> Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
            </h5>
            <table id="table-users" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Nome</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Perfil</th>
                        <th class="th-sm">Data</th>
                        <th style="text-align:center" class="th-sm">Acções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td v-for="perfil in user.perfies" :key="perfil.id">
                            {{ perfil.nome }}
                        </td>
                        <td>{{ user.created_at | myDate }}</td>
                        <td style="text-align:center">
                            <a class="edit" href="#" @click="editModal(user)">
                                <i class="os-icon os-icon-ui-49"></i>
                            </a>
                            /
                            <a class="delete" href="#" @click="deleteUser(user.id)">
                                <i class="os-icon os-icon-ui-15"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <user-add></user-add>
    </div>
</template>

<script>
  import { mdbDatatable } from 'mdbvue';
  export default {
    data() {
        return {
            dt: null,
            users: []
        }
    },
    methods: {
        editModal(user){
            Fire.$emit('editModalUser');
            $('#addUser').modal('show');
            Fire.$emit('editModalUserFill', user);
        },
        newModal(){
            Fire.$emit('newModalUser');
            $('#addUser').modal('show');
        },
        deleteUser(id){
            Fire.$emit('user-deleted', id);
        },
        loadUsers() {
            axios.get("api/users")
                    .then((res) => {
                        this.users = res.data;
                        // console.log(this.users);
                    });
        }
    },
    created() {
        Fire.$on('user-added', data => {
            // this.users.unshift(data);
            this.loadUsers();
            $('#addUser').modal('hide');
        });
        Fire.$on('user-deleted-done', () => {
            this.loadUsers();
        });
        Fire.$on('user-updated', () => {
            $('#addUser').modal('hide');
            this.loadUsers();
        });
    },
    mounted() {
        this.dt = $('#table-users').DataTable({
            "scrollY": "50px",
            "scrollCollapse": true,
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');
        this.loadUsers();
    },
    watch: {
        users(val) {
            this.dt.destroy();
            this.$nextTick(() => {
                this.dt = $('#table-users').DataTable({
                            "scrollY": "200px",
                            "scrollCollapse": true,
                            "ordering": false
                        });
                $('.dataTables_length').addClass('bs-select');
            });
        }
    },
  }
</script>
