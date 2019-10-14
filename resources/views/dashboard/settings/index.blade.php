@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Título do Site</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Título do Site</label>
                                    <input type="hidden" name="key" value="title_site" />
                                    <input type="text" value="{{ old('value', getValue("title_site")) }}" maxlength="2096" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Texto do Quem Somos</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Quem Somos</label>
                                    <input type="hidden" name="key" value="quem_somos" />
                                    <textarea name="value" class="form-control" rows="10">{{ old('value', getValue('quem_somos')) }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Link do Whatsapp</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Link do Grupo</label>
                                    <input type="hidden" name="key" value="whatsapp_group" />
                                    <input type="text" value="{{ old('value', getValue('whatsapp_group')) }}" maxlength="2096" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Número do Whatsapp</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Número do Whatsapp</label>
                                    <input type="hidden" name="key" value="whatsapp_number" />
                                    <input type="text" value="{{ old('value', getValue('whatsapp_number')) }}" maxlength="20" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Facebook ID</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Facebook ID (Messeger)</label>
                                    <input type="hidden" name="key" value="facebook_id" />
                                    <input type="text" value="{{ old('value', getValue('facebook_id')) }}" maxlength="500" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Token Onesignal</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Token do Onesignal (Push)</label>
                                    <input type="hidden" name="key" value="onesignal_id" />
                                    <input type="text" value="{{ old('value', getValue('onesignal_id')) }}" maxlength="500" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Google Analytics</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("settings.changemetadata") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Google Analytics ID (Rastreamento)</label>
                                    <input type="hidden" name="key" value="google_analytics" />
                                    <input type="text" value="{{ old('value', getValue('google_analytics')) }}" maxlength="500" class="form-control" name="value" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Banner do Site</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route("settings.changebanner") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="">
                                    <label class="bmd-label-floating">Banner Principal</label>
                                    <br />
                                    <input type="file" name="banner" accept="image/*" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Site SEO</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route("settings.changemetadata1") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Nome do Site</label>
                                    <input type="text" value="{{ old('value', getValue('seo_name')) }}" maxlength="500" class="form-control" name="seo_name" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Descrição do Site</label>
                                    <textarea class="form-control" name="seo_description" required>{{ old('value', getValue('seo_description')) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <label class="bmd-label-floating">Banner SEO</label>
                                    <br />
                                    <input type="file" name="seo_imagem" accept="image/*" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Facebook SEO</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route("settings.changemetadata2") }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Nome do Site</label>
                                    <input type="text" value="{{ old('value', getValue("og_site_name")) }}" maxlength="500" class="form-control" name="og_site_name" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Titulo da Publicação</label>
                                    <input type="text" value="{{ old('value', getValue('og_title')) }}" maxlength="500" class="form-control" name="og_title" required />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Descrição do Site</label>
                                    <textarea class="form-control" name="og_description" required>{{ old('value', getValue('og_description')) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Tags do Site (Separe por vírgula)</label>
                                    <textarea class="form-control" name="article_tag" required>{{ old('value', getValue('article_tag')) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <label class="bmd-label-floating">Banner SEO</label>
                                    <br />
                                    <input type="file" name="seo_imagem" accept="image/*" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('SCRIPT')

@endsection
