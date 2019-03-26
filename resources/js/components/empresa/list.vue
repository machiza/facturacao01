<template>
    <div class="element-wrapper">
        <div class="element-box">
        <h5 class="form-inline justify-content-sm-end">
            <button class="mr-2 mb-2 btn btn-success" data-target="#onboardingFormModal" data-toggle="modal" type="button"> Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
        </h5>
        <div class="table-responsive">
            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
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
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Nuit</th>
                        <th>Email</th>
                        <th>Telemovel</th>
                        <th>Data</th>
                        <th>Acções</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>
                            <a href="http://">
                                <i class="os-icon os-icon-ui-49 blue"></i>
                            </a>
                            /
                            <a class="danger" href="http://">
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
