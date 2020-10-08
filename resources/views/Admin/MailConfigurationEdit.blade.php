@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')



<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Email Configuration</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('email-config.update', $email->id)}}" name="addEmailForm">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-host" class="col-form-label">SMTP Host:</label>
                                    <input type="text" required name="smtpHost" class="form-control text-white"
                                        id="smtp-host" value="{{$email->host}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-username" class="col-form-label">SMTP Username:</label>
                                    <input type="text" required class="form-control text-white" name="smtpUsername"
                                        value="{{$email->username}}" id="smtp-username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-password" class="col-form-label">SMTP Password:</label>
                                    <input type="text" required name="smtpPassword" class="form-control text-white"
                                        id="smtp-password" value="{{$email->password}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-port" class="col-form-label">SMTP Port:</label>
                                    <input type="text" required name="smtpPort" class="form-control text-white"
                                        id="smtp-port" value="{{$email->port}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-send-from" class="col-form-label">SMTP Send From Email:</label>
                                    <input type="text" required name="smtpSendFromEmail" class="form-control text-white"
                                        value="{{$email->emailFrom}}" id="smtp-send-from">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="smtp-send-from-name" class="col-form-label">SMTP Send From
                                        Name:</label>
                                    <input type="text" required name="smtpSendFromName" class="form-control text-white"
                                        value="{{$email->emailFromName}}" id="smtp-send-from-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="SMTP-Send-From-Name" class="col-form-label">SMTP Send From Name:</label>
                                    <select name="status" class="form-control text-white" id="SMTP-Send-From-Name">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 text-center">
                                <input type="submit" class="btn btn-primary" title="Update" />
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </form>
                </div>

            </div>




        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
<script>
    $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
</script>
@endpush