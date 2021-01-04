
<div class="modal fade" id="modalConsultarCupos">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <ol class="float-sm-left">
                <p><h4>Grados disponibles</h4> </p>
                </ol>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header" id="modalHeader">
                                
                            </div><!-- cerrado del cardheader -->
                            <div class="card-body">
                                <table class="table table-bordered thead-dark table-hover table-sm">    
                                        <tr>
                                            <th scope="col">Turno Matutino</th>
                                            
                                            <th scope="col">Turno Vespertino</th>
                                            
                                            <th scope="col">Turno Completo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="gradosModal"></td>
                                            
                                            <td id="gradosModalVesp"></td>
                                            
                                            <td id="gradosModalComp"></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>

                                
                                

                                
                                

                                
                                {{-- <label>hola </label>
                                <meter id="" min="0" max="40"
                                low="5" high="10"
                                optimun="20" value="4" title="Quedan tantos cupos">El navegador no soporta este elemento</meter> --}}
                            </div><!-- cerrado del card body -->
                        </div><!-- cerrado del class card -->
                    </div><!-- cerrado del container fluid -->
                </div><!-- cerrado del container -->
            </div>
            <div class="modal-footer">
                <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->
            </div>
        </div>
    </div>
</div>
