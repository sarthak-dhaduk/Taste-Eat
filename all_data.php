<?php include './admin_include/header.php'?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                    
                    <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
                        <!-- Button trigger modal -->
                        <!-- <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCenter">
                            Add Items
                        </button>

                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameWithTitle" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            id="nameWithTitle"
                                            class="form-control"
                                            placeholder="Enter Name" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Email</label>
                                        <input
                                            type="email"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="xxxx@xxx.xx" />
                                        </div>
                                        <div class="col mb-0">
                                        <label for="dobWithTitle" class="form-label">DOB</label>
                                        <input type="date" id="dobWithTitle" class="form-control" />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Client</th>
                            <th>Users</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                            <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                            <span class="fw-medium">Angular Project</span>
                            </td>
                            <td>Albert Cook</td>
                            <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="Lilian Fuller">
                                <img src="./admin/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="Sophia Wilkerson">
                                <img src="./admin/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="Christina Parker">
                                <img src="./admin/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                            </td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                            <td>
                            <div class="d-flex justify-content-around">
                                <div class="btn-group" role="group" aria-label="First group">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                    <i class="tf-icons bx bxs-edit"></i>
                                </button>
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                <label for="nameWithTitle" class="form-label">Name</label>
                                                <input
                                                    type="text"
                                                    id="nameWithTitle"
                                                    class="form-control"
                                                    placeholder="Enter Name" />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                <label for="emailWithTitle" class="form-label">Email</label>
                                                <input
                                                    type="email"
                                                    id="emailWithTitle"
                                                    class="form-control"
                                                    placeholder="xxxx@xxx.xx" />
                                                </div>
                                                <div class="col mb-0">
                                                <label for="dobWithTitle" class="form-label">DOB</label>
                                                <input type="date" id="dobWithTitle" class="form-control" />
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="tf-icons bx bxs-trash"></i>
                                </button>
                                </div>
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                        
                        <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
                            <!-- Button trigger modal -->
                            <!-- <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                Add Items
                            </button>

                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                class="form-control"
                                                placeholder="Enter Name" />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                id="emailWithTitle"
                                                class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                            </div>
                                            <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">DOB</label>
                                            <input type="date" id="dobWithTitle" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Users</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">Angular Project</span>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller">
                                    <img src="./admin/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Sophia Wilkerson">
                                    <img src="./admin/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Christina Parker">
                                    <img src="./admin/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                <div class="d-flex justify-content-around">
                                    <div class="btn-group" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                        <i class="tf-icons bx bxs-edit"></i>
                                    </button>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input
                                                        type="text"
                                                        id="nameWithTitle"
                                                        class="form-control"
                                                        placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label for="emailWithTitle" class="form-label">Email</label>
                                                    <input
                                                        type="email"
                                                        id="emailWithTitle"
                                                        class="form-control"
                                                        placeholder="xxxx@xxx.xx" />
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                                    <input type="date" id="dobWithTitle" class="form-control" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="tf-icons bx bxs-trash"></i>
                                    </button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                        
                        <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
                            <!-- Button trigger modal -->
                            <!-- <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                Add Items
                            </button>

                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                class="form-control"
                                                placeholder="Enter Name" />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                id="emailWithTitle"
                                                class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                            </div>
                                            <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">DOB</label>
                                            <input type="date" id="dobWithTitle" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Users</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">Angular Project</span>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller">
                                    <img src="./admin/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Sophia Wilkerson">
                                    <img src="./admin/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Christina Parker">
                                    <img src="./admin/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                <div class="d-flex justify-content-around">
                                    <div class="btn-group" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                        <i class="tf-icons bx bxs-edit"></i>
                                    </button>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input
                                                        type="text"
                                                        id="nameWithTitle"
                                                        class="form-control"
                                                        placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label for="emailWithTitle" class="form-label">Email</label>
                                                    <input
                                                        type="email"
                                                        id="emailWithTitle"
                                                        class="form-control"
                                                        placeholder="xxxx@xxx.xx" />
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                                    <input type="date" id="dobWithTitle" class="form-control" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="tf-icons bx bxs-trash"></i>
                                    </button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                        
                        <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
                            <!-- Button trigger modal -->
                            <!-- <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                Add Items
                            </button>

                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                class="form-control"
                                                placeholder="Enter Name" />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                id="emailWithTitle"
                                                class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                            </div>
                                            <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">DOB</label>
                                            <input type="date" id="dobWithTitle" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Users</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">Angular Project</span>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller">
                                    <img src="./admin/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Sophia Wilkerson">
                                    <img src="./admin/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Christina Parker">
                                    <img src="./admin/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                <div class="d-flex justify-content-around">
                                    <div class="btn-group" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                        <i class="tf-icons bx bxs-edit"></i>
                                    </button>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input
                                                        type="text"
                                                        id="nameWithTitle"
                                                        class="form-control"
                                                        placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label for="emailWithTitle" class="form-label">Email</label>
                                                    <input
                                                        type="email"
                                                        id="emailWithTitle"
                                                        class="form-control"
                                                        placeholder="xxxx@xxx.xx" />
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                                    <input type="date" id="dobWithTitle" class="form-control" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="tf-icons bx bxs-trash"></i>
                                    </button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                        
                        <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
                            <!-- Button trigger modal -->
                            <!-- <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter">
                                Add Items
                            </button>

                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                class="form-control"
                                                placeholder="Enter Name" />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                            <label for="emailWithTitle" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                id="emailWithTitle"
                                                class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                            </div>
                                            <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">DOB</label>
                                            <input type="date" id="dobWithTitle" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Users</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                <span class="fw-medium">Angular Project</span>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller">
                                    <img src="./admin/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Sophia Wilkerson">
                                    <img src="./admin/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Christina Parker">
                                    <img src="./admin/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                <div class="d-flex justify-content-around">
                                    <div class="btn-group" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                        <i class="tf-icons bx bxs-edit"></i>
                                    </button>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input
                                                        type="text"
                                                        id="nameWithTitle"
                                                        class="form-control"
                                                        placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label for="emailWithTitle" class="form-label">Email</label>
                                                    <input
                                                        type="email"
                                                        id="emailWithTitle"
                                                        class="form-control"
                                                        placeholder="xxxx@xxx.xx" />
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                                    <input type="date" id="dobWithTitle" class="form-control" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="tf-icons bx bxs-trash"></i>
                                    </button>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
        </div>

<?php include './admin_include/footer.php'?>