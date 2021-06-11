@extends('dashboard')

@section('title')
    Roles
@endsection

@section('header')
    Roles
@endsection

@section('content')
<div class="py-12">
  @if ($errors->any())
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
        <li class="block sm:inline">{{ $error }}</li>
        @endforeach
      </ul>  
    </div>
  </div>
  @endif
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              Create Role
          </div>
          @if (session()->has('message'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-5" role="alert">
              <span class="block sm:inline">{{ session()->get('message') }}</span>
          </div>
          @endif
          <div class="m-4">
              <form method="POST" action="{{ route('role.create') }}" class="w-1/2">
                  @csrf
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Role Name
                      </label>
                    </div>
                    <div class="ml-10 md:w-2/3">
                      <input placeholder="e.g Finance Administrator" class="placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" type="text" name="name">
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="description">
                        Description
                      </label>
                    </div>
                    <div class="ml-10 md:w-2/3">
                      <textarea placeholder="e.g Finance Administrator role is managing all about the Finance Section" class="placeholder-gray-300::placeholder bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="description" name="description"></textarea>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="email">
                        Abilities
                      </label>
                    </div>
                    <div class="ml-10 md:w-2/3">
                      <div class="inline-block">
                        <label class="inline-flex">
                          <input class="ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Create">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Create
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input class="ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Read">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Read
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input class="ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Update">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Update
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input class="ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Delete">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Delete
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div id="section-wrapper">
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="section">
                          Section
                        </label>
                      </div>
                      <div class="ml-10 md:w-2/3 flex section-input" id="section">
                        <select name="section_option" id="section-options">
                          <option value="">- Choose Section -</option>
                          <option value="new">- New Section -</option>
                          @foreach ($sections as $section)
                          <option value="{{ $section }}">{{ ucfirst($section) }}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- <div class="ml-10 md:w-2/3 flex">
                        <input id="section" type="text" name="sections[]" placeholder="e.g Finance" class="placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        <span class="m-auto ml-3">
                          <a class="role-add-input" href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                          </a>
                        </span>
                      </div> --}}
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <div class="ml-10 md:w-2/3 flex section-input" id="section-input">
                      <input id="input-field" type="text" name="section" placeholder="e.g Finance" class="section-field placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                      {{-- <span class="m-auto ml-3">
                        <a class="ability-add-input" href="javascript:void(0);">
                          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                        </a>
                      </span> --}}
                    </div>
                  </div>
                  <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="ml-10 md:w-2/3">
                      <button class="shadow bg-transparent hover:bg-gray-700 hover:text-white focus:shadow-outline focus:outline-none text-gray-700 font-bold py-2 px-4 rounded" type="submit">
                        Create Role
                      </button>
                    </div>
                  </div>
                </form>
          </div>
      </div>
  </div>
</div>

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
              Assign Abilities
          </div>
          @if (session()->has('msg'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-5" role="alert">
              <span class="block sm:inline">{{ session()->get('msg') }}</span>
          </div>
          @endif
          <div class="m-4">
              <form method="POST" action="{{ route('permission.assign') }}" class="w-1/2">
                  @csrf
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Role
                      </label>
                    </div>
                    <div class="ml-10 md:w-2/3">
                      <select name="role" id="role">
                        <option value="">- Choose Role -</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div id="ability-section-wrapper">
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="section">
                          Section
                        </label>
                      </div>
                      <div class="ml-10 md:w-2/3 flex section-input" id="abi-section">
                        <select name="abi_section_option" id="abi-section-options">
                          <option value="">- Choose Section -</option>
                          <option value="new">- New Section -</option>
                          @foreach ($sections as $section)
                          <option value="{{ $section }}">{{ ucfirst($section) }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="email">
                        Abilities
                      </label>
                    </div>
                    <div class="ml-10 md:w-2/3">
                      <div class="inline-block">
                        <label class="inline-flex">
                          <input id="create" class="ability-check ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Create">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Create
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input id="read" class="ability-check ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Read">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Read
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input id="update" class="ability-check ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Update">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Update
                          </span>
                        </label>
                        <label class="inline-flex">
                          <input id="delete" class="ability-check ml-2 mr-1 mb-1 mt-1 inline-block" type="checkbox" name="abilities[]" id="ability-create" value="Delete">
                          <span class="ml-2 mr-1 mb-1 mt-1 text-sm inline-block align-baseline">
                            Delete
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <div class="ml-10 md:w-2/3 flex section-input" id="abi-section-input">
                      <input id="abi-input-field" type="text" name="abi_section" placeholder="e.g Finance" class="section-field placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                      {{-- <span class="m-auto ml-3">
                        <a class="ability-add-input" href="javascript:void(0);">
                          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                        </a>
                      </span> --}}
                    </div>
                  </div>
                  <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="ml-10 md:w-2/3">
                      <button class="shadow bg-transparent hover:bg-gray-700 hover:text-white focus:shadow-outline focus:outline-none text-gray-700 font-bold py-2 px-4 rounded" type="submit">
                        Assign
                      </button>
                    </div>
                  </div>
                </form>
          </div>
      </div>
  </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Role List
            </div>
            <div class="m-4">
                <table class="table-auto w-full">
                    <thead>
                        <th class="px-4 py-2 text-emerald-600">No</th>
                        <th class="px-4 py-2 text-emerald-600">Role</th>
                        <th class="px-4 py-2 text-emerald-600">Description</th>
                        <th class="px-4 py-2 text-emerald-600">Abilities</th>
                        <th class="px-4 py-2 text-emerald-600">Created at</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($roles as $role)
                            <tr>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $no++ }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $role->display_name }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $role->description }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                    @foreach ($role->permissions as $permission)
                                        {{ $permission->display_name }} <br>
                                    @endforeach
                                </td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $role->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('scripts')
  <template id="input-temp">
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3"></div>
      <div class="ml-10 md:w-2/3 flex">
        <input id="section" type="text" name="sections[]" placeholder="e.g Finance" class="placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
        <span class="m-auto ml-3">
          <a class="rm-input" href="javascript:void(0);">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M0 10h24v4h-24z"/></svg>
          </a>
        </span>
      </div>
    </div>
  </template>
  <template id="ability-input-temp">
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3"></div>
      <div class="ml-10 md:w-2/3 flex">
        <input id="section" type="text" name="abisections[]" placeholder="e.g Finance" class="placeholder-gray-300::placeholder white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
        <span class="m-auto ml-3">
          <a class="rm-input" href="javascript:void(0);">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path d="M0 10h24v4h-24z"/></svg>
          </a>
        </span>
      </div>
    </div>
  </template>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      let roleTemp = $('#input-temp').html();
      let abiTemp = $('#ability-input-temp').html();
      let wrapper = $('#section-wrapper');
      let abiWrapper = $('#ability-section-wrapper');
      let roleAddBtn = $('.role-add-input'),
        abiAddBtn = $('.ability-add-input');
      var rmBtn = $('.rm-input');

      $('.section-field').hide();
      $(roleAddBtn).click(function () {
        $(wrapper).append(roleTemp);
      });
      $(abiAddBtn).click(function () {
        $(abiWrapper).append(abiTemp);
      });
      $(wrapper).on('click', '.rm-input',function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
      });
      $(abiWrapper).on('click', '.rm-input',function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
      });

      $('#abi-section-options').on('change', function () {
        let role;
        let section;
        if ($(this).val() == 'new') {
          $('#abi-input-field').show();
        } else {
          $('#abi-input-field').hide();
          section = $(this).val();
          role = $('#role').val();
          if (role) {
            uncheckAbility();
            roleChecker(role, section);
          }
        }
      });

      $('#role').on('change', function () {
        let role = $(this).val();
        let section = $('#abi-section-options').val();
        if (section) {
          uncheckAbility();
          roleChecker(role, section);
        }
      })

      $('#section-options').on('change', function () {
        if ($(this).val() == 'new') {
          $('#input-field').show();
        } else {
          $('#input-field').hide();
        }
      });
    });

    uncheckAbility = () => {
      $('.ability-check').each(function () {
        $(this).prop('checked', false);
      });
    }

    roleChecker = (rol, sect) => {
      let data;
      $.ajax({
        url: "/role/checker",
        type: "GET",
        data: { role: rol, section: sect },
        dataType: 'json',
        success: function (response) {
          data = response.data;

          $.each(data, function (i, val) {
            if (val == 'create') $('#create').prop('checked', true);    
            if (val == 'read') $('#read').prop('checked', true);    
            if (val == 'update') $('#update').prop('checked', true);    
            if (val == 'delete') $('#delete').prop('checked', true);    
          });
        }
      });
    }
  </script>
@endsection
