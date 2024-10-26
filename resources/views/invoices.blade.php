@include('layouts.header')
@include('layouts.module.invoice_add_modal')
@include('layouts.module.invoice_edit_modal')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Fatura Ayarları</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Analiz</a></li>
                                <li class="breadcrumb-item active">Fatura Ayarları</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Faturalar</h5>
                            <p class="card-title-desc">
                                Faturalarınızı buradan yönetebilirsiniz.
                            </p>
                            <div class="row mb-4 justify-content-end">
                                <div class="col-sm-4 text-end">
                                    <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">
                                        <i class="fas fa-plus"></i> Yeni Fatura Ekle
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>Fatura ID</th>
                                            <th>Müşteri ID</th>
                                            <th>Tutar</th>
                                            <th>KDV Oranı</th>
                                            <th>KDV Tutarı</th>
                                            <th>Durum</th>
                                            <th>Son Ödeme Tarihi</th>
                                            <th>Sipariş ID</th>
                                            <th>Ödeme Yöntemi</th>
                                            <th>Notlar</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->id }}</td>
                                                <td>{{ $invoice->customer_id }}</td>
                                                <td>{{ $invoice->amount }}</td>
                                                <td>{{ $invoice->vat_rate }}</td>
                                                <td>{{ $invoice->vat_amount }}</td>
                                                <td>{{ $invoice->status }}</td>
                                                <td>{{ $invoice->due_date }}</td>
                                                <td>{{ $invoice->order_id }}</td>
                                                <td>{{ $invoice->payment_method }}</td>
                                                <td>{{ $invoice->notes }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editInvoiceModal{{ $invoice->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="{{ route('invoices.delete', $invoice->id) }}" class="btn btn-danger" onclick="return confirm('Bu faturayı silmek istediğinize emin misiniz?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @include('layouts.module.invoice_edit_modal', ['invoice' => $invoice])
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            @include('layouts.footer')
            @include('layouts.datatable')
        </div> <!-- end container-fluid -->
    </div> <!-- end page-content -->
</div> <!-- end main-content -->
