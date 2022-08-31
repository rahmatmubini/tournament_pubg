@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
        <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Edit Rule Point</h1>
    <div class="max-w-3xl text-2xl mx-auto">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/point/{{ $point->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <input type="hidden" class="form-control @error('tournament_id') is-invalid @enderror" id="tournament_id" name="tournament_id" required value="{{ $tournament->id }}">
                @error('tournament_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            
        <div class="grid grid-cols-9 gap-3">
            <div class="mb-3">
                <label for="kill" class="form-label">kill</label>
                <input type="text" class="form-control @error('kill') is-invalid @enderror" id="kill" name="kill" required autofocus placeholder="kill" value="{{ old('kill', $point->kill) }}">
                @error('kill')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag1" class="form-label">#1</label>
                <input type="text" class="form-control @error('hastag1') is-invalid @enderror" id="hastag1" name="hastag1" required autofocus placeholder="hastag1" value="{{ old('hastag1', $point->hastag1) }}">
                @error('hastag1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag2" class="form-label">#2</label>
                <input type="text" class="form-control @error('hastag2') is-invalid @enderror" id="hastag2" name="hastag2" required autofocus placeholder="hastag2" value="{{ old('hastag2', $point->hastag2) }}">
                @error('hastag2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag3" class="form-label">#3</label>
                <input type="text" class="form-control @error('hastag3') is-invalid @enderror" id="hastag3" name="hastag3" required autofocus placeholder="hastag3" value="{{ old('hastag3', $point->hastag3) }}">
                @error('hastag3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag4" class="form-label">#4</label>
                <input type="text" class="form-control @error('hastag4') is-invalid @enderror" id="hastag4" name="hastag4" required autofocus placeholder="hastag4" value="{{ old('hastag4', $point->hastag4) }}">
                @error('hastag4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag5" class="form-label">#5</label>
                <input type="text" class="form-control @error('hastag5') is-invalid @enderror" id="hastag5" name="hastag5" required autofocus placeholder="hastag5" value="{{ old('hastag5', $point->hastag5) }}">
                @error('hastag5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag6" class="form-label">#6</label>
                <input type="text" class="form-control @error('hastag6') is-invalid @enderror" id="hastag6" name="hastag6" required autofocus placeholder="hastag6" value="{{ old('hastag6', $point->hastag6) }}">
                @error('hastag6')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag7" class="form-label">#7</label>
                <input type="text" class="form-control @error('hastag7') is-invalid @enderror" id="hastag7" name="hastag7" required autofocus placeholder="hastag7" value="{{ old('hastag7', $point->hastag7) }}">
                @error('hastag7')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag8" class="form-label">#8</label>
                <input type="text" class="form-control @error('hastag8') is-invalid @enderror" id="hastag8" name="hastag8" required autofocus placeholder="hastag8" value="{{ old('hastag8', $point->hastag8) }}">
                @error('hastag8')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag9" class="form-label">#9</label>
                <input type="text" class="form-control @error('hastag9') is-invalid @enderror" id="hastag9" name="hastag9" required autofocus placeholder="hastag9" value="{{ old('hastag9', $point->hastag9) }}">
                @error('hastag9')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag10" class="form-label">#10</label>
                <input type="text" class="form-control @error('hastag10') is-invalid @enderror" id="hastag10" name="hastag10" required autofocus placeholder="hastag10" value="{{ old('hastag10', $point->hastag10) }}">
                @error('hastag10')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag11" class="form-label">#11</label>
                <input type="text" class="form-control @error('hastag11') is-invalid @enderror" id="hastag11" name="hastag11" required autofocus placeholder="hastag11" value="{{ old('hastag11', $point->hastag11) }}">
                @error('hastag11')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag12" class="form-label">#12</label>
                <input type="text" class="form-control @error('hastag12') is-invalid @enderror" id="hastag12" name="hastag12" required autofocus placeholder="hastag12" value="{{ old('hastag12', $point->hastag12) }}">
                @error('hastag12')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag13" class="form-label">#13</label>
                <input type="text" class="form-control @error('hastag13') is-invalid @enderror" id="hastag13" name="hastag13" required autofocus placeholder="hastag13" value="{{ old('hastag13', $point->hastag13) }}">
                @error('hastag13')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag14" class="form-label">#14</label>
                <input type="text" class="form-control @error('hastag14') is-invalid @enderror" id="hastag14" name="hastag14" required autofocus placeholder="hastag14" value="{{ old('hastag14', $point->hastag14) }}">
                @error('hastag14')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag15" class="form-label">#15</label>
                <input type="text" class="form-control @error('hastag15') is-invalid @enderror" id="hastag15" name="hastag15" required autofocus placeholder="hastag15" value="{{ old('hastag15', $point->hastag15) }}">
                @error('hastag15')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag16" class="form-label">#16</label>
                <input type="text" class="form-control @error('hastag16') is-invalid @enderror" id="hastag16" name="hastag16" required autofocus placeholder="hastag16" value="{{ old('hastag16', $point->hastag16) }}">
                @error('hastag16')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag17" class="form-label">#17</label>
                <input type="text" class="form-control @error('hastag17') is-invalid @enderror" id="hastag17" name="hastag17" required autofocus placeholder="hastag17" value="{{ old('hastag17', $point->hastag17) }}">
                @error('hastag17')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag18" class="form-label">#18</label>
                <input type="text" class="form-control @error('hastag18') is-invalid @enderror" id="hastag18" name="hastag18" required autofocus placeholder="hastag18" value="{{ old('hastag18', $point->hastag18) }}">
                @error('hastag18')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag19" class="form-label">#19</label>
                <input type="text" class="form-control @error('hastag19') is-invalid @enderror" id="hastag19" name="hastag19" required autofocus placeholder="hastag19" value="{{ old('hastag19', $point->hastag19) }}">
                @error('hastag19')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag20" class="form-label">#20</label>
                <input type="text" class="form-control @error('hastag20') is-invalid @enderror" id="hastag20" name="hastag20" required autofocus placeholder="hastag20" value="{{ old('hastag20', $point->hastag20) }}">
                @error('hastag20')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag21" class="form-label">#21</label>
                <input type="text" class="form-control @error('hastag21') is-invalid @enderror" id="hastag21" name="hastag21" required autofocus placeholder="hastag21" value="{{ old('hastag21', $point->hastag21) }}">
                @error('hastag21')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag22" class="form-label">#22</label>
                <input type="text" class="form-control @error('hastag22') is-invalid @enderror" id="hastag22" name="hastag22" required autofocus placeholder="hastag22" value="{{ old('hastag22', $point->hastag22) }}">
                @error('hastag22')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag23" class="form-label">#23</label>
                <input type="text" class="form-control @error('hastag23') is-invalid @enderror" id="hastag23" name="hastag23" required autofocus placeholder="hastag23" value="{{ old('hastag23', $point->hastag23) }}">
                @error('hastag23')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="hastag24" class="form-label">#24</label>
                <input type="text" class="form-control @error('hastag24') is-invalid @enderror" id="hastag24" name="hastag24" required autofocus placeholder="hastag24" value="{{ old('hastag24', $point->hastag24) }}">
                @error('hastag24')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hastag25" class="form-label">#25</label>
                <input type="text" class="form-control @error('hastag25') is-invalid @enderror" id="hastag25" name="hastag25" required autofocus placeholder="hastag25" value="{{ old('hastag25', $point->hastag25) }}">
                @error('hastag25')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn bg-sky-500">Edit Point</button>
        </form>
    </div>
</div>
@endsection