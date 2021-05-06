<div class="shadow p-2 ">
    <h4 class="text-center">
        Latest Messages
    </h4>
    <div class="">
        <table class="table">
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Email
                </th>
                <th>
                    Message
                </th>
                <th>

                </th>
            </tr>
                @php
                    $msgs=\App\Models\ClientMessage::orderBy('id','DESC')->take(7)->get();
                @endphp
                @foreach ($msgs as $msg)
                    <tr>
                        <td>{{$msg->name}}</td>
                        <td>{{$msg->phone}}</td>
                        <td>{{$msg->email}}</td>
                        <td>{{$msg->message}}</td>
                        <td>
                            {{$msg->created_at->diffForHumans()}}
                        </td>
                    </tr>     
                @endforeach
        </table>
        <div class="text-center">
            <h5>
                <a href="{{route('admin.message')}}">View All &#8594;</a>
            </h5>
        </div>
    </div>
</div>