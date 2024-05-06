@extends('layout.layout')
@section('title', '《黑色契約MOBILE》國家戰爭')
@section('og:title', '《黑色契約MOBILE》國家戰爭')
@section('og:url', 'https://cbm.digeam.com/war')
@section('css')
    <link rel="stylesheet" href="/css/homepage/page.css">
@endsection

@section('content')
    <div class="wrap">
        <div class="title"><img src="/img/homepage/war/warTitle.png"></div>
        <div id="war">
            <div class="wartitle"><img src="/img/homepage/war/warConsequenceTitle.png"></div>
            <div class="warbox">
                <div class="warBlue">
                    <div class="warIcon"><img src="/img/homepage/s2/warBlueIconBling.png"></div>
                    <div class="warText"><img src="/img/homepage/s2/warBlueTitle.png"></div>
                </div>
                <div class="warScore">
                    @if ($result->data->warResult == null)
                    <div class="score blueScore">00</div>
                    @else
                        @if ($result->data->warResult->capella < 10)
                        <div class="score blueScore">0{{ $result->data->warResult->capella }}</div>
                        @else
                        <div class="score blueScore">{{ $result->data->warResult->capella }}</div>
                        @endif
                    @endif
                    <div class="textDeco"><img src="/img/homepage/s2/wartextDeco.png"></div>
                    @if ($result->data->warResult == null)
                    <div class="score redScore">00</div>
                    @else
                        @if ($result->data->warResult->procyon < 10)
                        <div class="score redScore">0{{ $result->data->warResult->procyon }}</div>
                        @else
                        <div class="score redScore">{{ $result->data->warResult->procyon }}</div>
                        @endif 
                    @endif
                    <span>(僅統計最近三個月)</span>
                </div>
                <div class="warRed">
                    <div class="warIcon"><img src="/img/homepage/s2/warRedIconBling.png"></div>
                    <div class="warText"><img src="/img/homepage/s2/warRedTitle.png"></div>
                </div>
            </div>

            <div class="rankbox rankbox_pc">
                <div class="wartitle"><img src="/img/homepage/war/warDirectorTitle.png"></div>
                <div class="rank-info">
                    <div class="rankTop">
                        <div class="rank_blue playerIcon"></div>
                        <div class="rank_blue playerID">玩家ID</div>
                        <div class="rank_blue playerScore">得分</div>
                        <div class="rank_blue playerKill">擊殺數</div>
                        <div class="playerLever">等級區間</div>
                        <div class="rank_red playerID">玩家ID</div>
                        <div class="rank_red playerScore">得分</div>
                        <div class="rank_red playerID">擊殺數</div>
                        <div class="rank_red playerIcon"></div>
                    </div>
                    @foreach ($result->data->bringersWithLevelType as $key => $value)
                         <div class="rankText">
                            @if ($value->cepella == null)
                                <div class="rank_blue playerIcon"><img src="/img/homepage/war/icon0.png"></div>
                                <div class="rank_blue playerID">-</div>
                                <div class="rank_blue playerScore">-</div>
                                <div class="rank_blue playerKill">-</div>
                            @else
                                <div class="rank_blue playerIcon"><img src="/img/homepage/war/icon{{ $value->cepella->battleStyle }}.png"></div>
                                <div class="rank_blue playerID">{{ $value->cepella->characterName }}</div>
                                <div class="rank_blue playerScore">{{ $value->cepella->score }}</div>
                                <div class="rank_blue playerKill">{{ $value->cepella->killcount }}</div>
                            @endif

                            <div class="playerLever"><img src="/img/homepage/war/{{ $key }}.png"></div>


                            @if ($value->procyon ==null)
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerScore">-</div>
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerIcon"><img src="/img/homepage/war/icon0.png"></div>
                            @else
                                <div class="rank_red playerID">{{ $value->procyon->characterName }}</div>
                                <div class="rank_red playerScore">{{ $value->procyon->score }}</div>
                                <div class="rank_red playerID">{{ $value->procyon->killcount }}</div>
                                <div class="rank_red playerIcon"><img src="/img/homepage/war/icon{{ $value->procyon->battleStyle }}.png"></div>
                            @endif
                        </div>
                    @endforeach
                </div>    
            </div>

            <div class="rankbox rankbox_m">
                <div class="wartitle"><img src="/img/homepage/war/warDirectorTitle.png"></div>
                <div class="rank-info">
                    <div class="rankTop">
                        <div class="rank_blue playerIcon"></div>
                        <div class="rank_blue playerID">玩家ID</div>
                        <div class="rank_blue playerScore">得分</div>
                        <div class="rank_blue playerKill">擊殺數</div>
                        <div class="playerLever">等級區間</div>
                        <div class="rank_red playerID">玩家ID</div>
                        <div class="rank_red playerScore">得分</div>
                        <div class="rank_red playerID">擊殺數</div>
                        <div class="rank_red playerIcon"></div>
                    </div>
                    @foreach ($result->data->bringersWithLevelType as $key => $value)
                         <div class="rankText">
                            @if ($value->cepella == null)
                                <div class="rank_blue playerIcon"><img src="/img/homepage/war/icon0.png"></div>
                                <div class="rank_blue playerID">-</div>
                                <div class="rank_blue playerScore">-</div>
                                <div class="rank_blue playerKill">-</div>
                            @else
                                <div class="rank_blue playerIcon"><img src="/img/homepage/war/icon{{ $value->cepella->battleStyle }}.png"></div>
                                <div class="rank_blue playerID">{{ $value->cepella->characterName }}</div>
                                <div class="rank_blue playerScore">{{ $value->cepella->score }}</div>
                                <div class="rank_blue playerKill">{{ $value->cepella->killcount }}</div>
                            @endif

                            <div class="playerLever"><img src="/img/homepage/war/{{ $key }}.png"></div>


                            @if ($value->procyon ==null)
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerScore">-</div>
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerIcon"><img src="/img/homepage/war/icon0.png"></div>
                            @else
                                <div class="rank_red playerID">{{ $value->procyon->characterName }}</div>
                                <div class="rank_red playerScore">{{ $value->procyon->score }}</div>
                                <div class="rank_red playerID">{{ $value->procyon->killcount }}</div>
                                <div class="rank_red playerIcon"><img src="/img/homepage/war/icon{{ $value->procyon->battleStyle }}.png"></div>
                            @endif
                        </div>
                    @endforeach
                </div>    
            </div>

            <div class="rankbox2 rankbox_pc">
                <div class="wartitle"><img src="/img/homepage/war/warProtectorTitle.png"></div>
                <div class="rank-info">
                    <div class="rankTop">
                        <div class="blueTeam">
                            <div class="rank_blue playerID">玩家ID</div>
                            <div class="rank_blue playerLevel">等級</div>
                            <div class="rank_blue playerGuild">所屬公會</div>
                        </div>
                        <div class="playerIcon"></div>
                        <div class="redTeam">
                            <div class="rank_red playerID">玩家ID</div>
                            <div class="rank_red playerLevel">等級</div>
                            <div class="rank_red playerGuild">所屬公會</div>
                        </div>
                    </div>
                    @foreach ($result->data->guardianWithClass as $key => $value)
                        <div class="rankText">
                            <div class="blueInfo">
                                @if($value->cepella != null )
                                <div class="rank_blue playerID">{{ $value->cepella->characterName }}</div>
                                <div class="rank_blue playerLevel">{{ $value->cepella->level }}</div>
                                <div class="rank_blue playerGuild">{{ $value->cepella->guildName }}</div>
                                @else
                                <div class="rank_blue playerID">-</div>
                                <div class="rank_blue playerLevel">-</div>
                                <div class="rank_blue playerGuild">-</div>
                                @endif
                            </div>
                            <div class="playerIcon"><img src="/img/homepage/war/icon{{ $value->type }}.png"></div>
                            <div class="redInfo">
                                @if ($value->procyon != null)
                                <div class="rank_red playerID">{{ $value->procyon->characterName }}</div>
                                <div class="rank_red playerLevel">{{ $value->procyon->level }}</div>
                                <div class="rank_red playerGuild">{{ $value->procyon->guildName }}</div>
                                @else
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerLevel">-</div>
                                <div class="rank_red playerGuild">-</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rankbox2 rankbox_m">
                <div class="wartitle"><img src="/img/homepage/war/warProtectorTitle.png"></div>
                <div class="rank-info">
                    <div class="rankTop">
                        <div class="blueTeam">
                            <div class="rank_blue playerID">玩家ID</div>
                            <div class="rank_blue playerLevel">等級</div>
                            <div class="rank_blue playerGuild">所屬公會</div>
                        </div>
                        <div class="playerIcon"></div>
                        <div class="redTeam">
                            <div class="rank_red playerID">玩家ID</div>
                            <div class="rank_red playerLevel">等級</div>
                            <div class="rank_red playerGuild">所屬公會</div>
                        </div>
                    </div>
                    @foreach ($result->data->guardianWithClass as $key => $value)
                        <div class="rankText">
                            <div class="blueInfo">
                                @if($value->cepella != null )
                                <div class="rank_blue playerID">{{ $value->cepella->characterName }}</div>
                                <div class="rank_blue playerLevel">{{ $value->cepella->level }}</div>
                                <div class="rank_blue playerGuild">{{ $value->cepella->guildName }}</div>
                                @else
                                <div class="rank_blue playerID">-</div>
                                <div class="rank_blue playerLevel">-</div>
                                <div class="rank_blue playerGuild">-</div>
                                @endif
                            </div>
                            <div class="playerIcon"><img src="/img/homepage/war/icon{{ $value->type }}.png"></div>
                            <div class="redInfo">
                                @if ($value->procyon != null)
                                <div class="rank_red playerID">{{ $value->procyon->characterName }}</div>
                                <div class="rank_red playerLevel">{{ $value->procyon->level }}</div>
                                <div class="rank_red playerGuild">{{ $value->procyon->guildName }}</div>
                                @else
                                <div class="rank_red playerID">-</div>
                                <div class="rank_red playerLevel">-</div>
                                <div class="rank_red playerGuild">-</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
          /*---------War----------*/
          var str1 = $(".score").eq(0).html();
          var str2 = $(".score").eq(1).html();
          $(".score").html('');
          str1.toString().split('').forEach(function(number) {
            $(".score").eq(0).append('<img src=".//img/homepage/war/score_number_'+number+'.png">');
          });
          str2.toString().split('').forEach(function(number) {
            $(".score").eq(1).append('<img src=".//img/homepage/war/score_number_'+number+'.png">');
          });
        });
    </script>
@endsection