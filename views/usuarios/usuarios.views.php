<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="sucursales(); roles()" data-bs-toggle="modal" data-bs-target="#ModalUsuarios">Nuevo Usuario</button>


    <h5 class="card-header">Lista de Usuarios</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sede</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaUsuarios">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalUsuarios">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_usuarios" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Cedula</label>
                        <input type="text" name="Cedula" id="Cedula" class="form-control" placeholder="Ingrese su Cedula" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Nombres</label>
                        <input type="text" name="Nombres" id="Nombres" class="form-control" placeholder="Ingrese sus nombres" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Apelldios</label>
                        <input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Ingrese sus apellidos" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Sede</label>
                        <select id="SucursalId" name="SucursalId" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Rol</label>
                        <select id="RolId" name="RolId" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Correo Electrónico</label>
                        <input type="email" name="Correo" id="Correo" class="form-control" placeholder="Ingrese su Correo" require>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Contraseña</label>
                        <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="**********" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php require_once('../html/scripts2.php') ?>

<script src="./usuarios.js"></script>

<!--

    <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                    <td>Albert Cook</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                    <td>Barry Hunter</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                    <td>Trevor Baker</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                    </td>
                    <td>Jerry Milton</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>

 -->