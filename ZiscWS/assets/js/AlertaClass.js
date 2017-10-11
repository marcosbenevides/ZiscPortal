function AlertaClass(alerta) {

    this.id = alerta["id"];
    this.usuario = alerta["usuario"]["id"];
    this.logHora = alerta["logHora"];
    this.longitude = alerta["longitude"];
    this.latitude = alerta["latitude"];
    this.bairro = alerta["bairro"];
    this.cidade = alerta["cidade"];
    this.observacao = alerta["observacao"];
    this.tipo = alerta["tipo"];
    this.ePositivo = alerta["ePositivo"];
    this.ativo = alerta["ativo"];

}