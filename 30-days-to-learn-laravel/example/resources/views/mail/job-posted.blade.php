<h2>
    {{$job->title}}
</h2>
<p>
    Congrats! Your Job is now live in our website.
</p>

<p>
    <a href="{{url('/jobs/' . $job->id)}}">View your Job listing</a>
</p>
