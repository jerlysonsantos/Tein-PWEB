@extends('layouts.app')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div ng-app="select" ng-controller="controller">
        <div class="container">
            <br/>
            <h3 align="center">Cadastro de Equipamentos e sensores</a></h3>
            <br/>
            <div class="row">
                <div class="col-sm-6 pull-left">
                    <label>Busca:</label>
                    <input type="text" ng-model="search" ng-change="filter()" placeholder="Busca" class="form-control" />
                </div>
                <div class="col-sm-1 pull-left">
                    <label> </label>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Cadastrar
                      </button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div ng-include src="'views/insereEquips.html'"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
                <div class="col-sm-2 pull-right">
                    <label>Qtd por p&aacute;gina:</label>
                    <select ng-model="data_limit" class="form-control">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                    </select>

                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12" ng-show="filter_data > 0">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>id</th>
                            <th>Nome&nbsp;<a ng-click="sort_with('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Tipo&nbsp;<a ng-click="sort_with('type');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Local&nbsp;<a ng-click="sort_with('location');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th colspan=2>&nbsp;</th>
                           </thead>
                        <tbody>
                            <tr ng-repeat="data in searched = (file | filter:search | orderBy : base :reverse) | beginning_data:(current_grid-1)*data_limit | limitTo:data_limit">
                                <td><%data.id%></td>
                                <td><input type="text" class="form-control" style="border:0;" value="<%data.name%>"/></td>
                                <td><input type="text" class="form-control" style="border:0;" value="<%data.type%>"/></td>
                                <td><input type="text" class="form-control" style="border:0;" value="<%data.location%>"/></td>
                                <td>
                                  <button class="btn btn-success btn-xs" ng-click="update_data(data.id)">
                                       <span class="glyphicon glyphicon-edit"></span> Editar
                                  </button>
                                </td>
                                <td>
                                   <button class="btn btn-danger btn-xs" ng-click="delete_data(data.id)">
                                     <span class="glyphicon glyphicon-trash"></span> Del
                                   </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12" ng-show="filter_data == 0">
                    <div class="col-md-12">
                        <h4>Nenhum registro encontrado..</h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 pull-left">
                        <h5>Mostrando <% searched.length %> de <%entire_user%> registros</h5>
                    </div>
                    <div class="col-md-6" ng-show="filter_data > 0">
                        <div pagination="" page="current_grid" on-select-page="page_position(page)" boundary-links="true" total-items="filter_data" items-per-page="data_limit" class="pagination-small pull-right" previous-text="&laquo;" next-text="&raquo;" first-text="Primeiro" last-text="&Uacute;ltimo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="app/controllers/equipamentos/selectCtrl.js"></script>
    <script type="text/javascript" src="app/controllers/equipamentos/insertCtrl.js"></script>
@endsection
