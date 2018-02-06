<div class="modal fade" id="respuestas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-morado" id="myModalLabel"><i class="fa fa-question-circle-o"></i>Preguntas Y Respuestas</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            @foreach($total_respuestas as $res)
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h5>
                            <a href="{{ url('/productos/'.$res->producto_id) }}">
                                {{ $res->producto->titulo }}
                            </a>
                        </h5>
                    </div>
                    <div class="panel-body">
                        <span class="small">
                            {{ $res->pregunta }}
                        </span>
                        <br>
                        <div class="container">
                            {{ $res->respuesta }}
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>