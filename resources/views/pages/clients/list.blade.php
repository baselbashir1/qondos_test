<x-base-layout>

    <x-slot:pageTitle>العملاء</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-6">
                <a href="{{ route('clients.create') }}" class="btn btn-primary w-100 btn-lg mb-4">
                    <span class="btn-text-inner">إضافة عميل</span>
                </a>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>الاسم</th>
                                <th>رقم الهاتف</th>
                                <th>المدينة</th>
                                <th>البريد الالكتروني</th>
                                <th>كلمة المرور</th>
                                <th class="no-content text-center">خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($clients))
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->city }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ substr($client->password, 0, 15) }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item"
                                                        href="{{ route('clients.edit', ['client' => $client->id]) }}">تعديل</a>
                                                    <form
                                                        action="{{ route('clients.destroy', ['client' => $client->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit"
                                                            style="font-size: 13px">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="mb-4 text-center">
                                    <h4>لا يوجد عملاء</h4>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-base-layout>
