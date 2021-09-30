(self.webpackChunk=self.webpackChunk||[]).push([[482],{685:t=>{var i=function(){function t(t){this.recognizing=!1,this.startOnEnd=!1,this.final_transcript="",this.chat_id=t.chat_id,this.recognition=t.recognition,this.originText=""!=$("#CSChatMessage-"+this.chat_id).val()?$("#CSChatMessage-"+this.chat_id).val()+" ":""}return t.prototype.onstart=function(){$("#CSChatMessage-"+this.chat_id).addClass("admin-chat-mic"),$("#user-chat-status-"+this.chat_id).removeClass("icon-user").addClass("icon-mic"),$("#mic-chat-"+this.chat_id).addClass("text-danger").find(".mic-lang").text(this.recognition.lang),$("#user-is-typing-"+this.chat_id).html("Speak now.").css("visibility","visible")},t.prototype.onend=function(){$("#user-chat-status-"+this.chat_id).addClass("icon-user").removeClass("icon-mic"),$("#CSChatMessage-"+this.chat_id).removeClass("admin-chat-mic"),$("#mic-chat-"+this.chat_id).removeClass("text-danger").find(".mic-lang").text(""),$("#user-is-typing-"+this.chat_id).html(""),!0===this.startOnEnd&&(this.originText=$("#CSChatMessage-"+this.chat_id).val(),this.final_transcript="",this.startOnEnd=!1,this.recognition.start())},t.prototype.onerror=function(t){"no-speech"==t.error&&$("#user-is-typing-"+this.chat_id).html("No speech was detected.").css("visibility","visible"),"audio-capture"==t.error&&$("#user-is-typing-"+this.chat_id).html("No microphone was found.").css("visibility","visible"),"not-allowed"==t.error&&$("#user-is-typing-"+this.chat_id).html("Permission to use microphone was denied.").css("visibility","visible")},t.prototype.onresult=function(t){if(!1===this.startOnEnd){for(var i="",e=t.resultIndex;e<t.results.length;++e)t.results[e].isFinal?this.final_transcript+=t.results[e][0].transcript:i+=t.results[e][0].transcript;""!=i?$("#user-is-typing-"+this.chat_id).html(i).css("visibility","visible"):$("#user-is-typing-"+this.chat_id).html("").css("visibility","hidden"),$("#CSChatMessage-"+this.chat_id).val(this.originText+this.final_transcript+i).focus(),ee.emitEvent("afterSpeechToTextCallbackResult",[this.chat_id,this.originText+this.final_transcript+i]),lhinst.operatorTypingCallback(this.chat_id)}},t}();t.exports=function(){function t(){"webkitSpeechRecognition"in window?(this.recognizing=!1,this.browserSupported=!0,this.final_transcript="",this.chat_id=!1,this.chatDialect=[]):(alert("Sorry but only chrome is supported"),this.browserSupported=!1)}return t.prototype.stopSpeech=function(){!0===this.browserSupported&&!0===this.recognizing&&(this.recognizing=!1,this.recognition.stop())},t.prototype.messageSend=function(){!0===this.browserSupported&&(this.recognition.callbackHandler.startOnEnd=!0,this.recognition.stop())},t.prototype.setChatDialect=function(t,i){this.chatDialect[t]=i},t.prototype.getChatDialectAndStart=function(){var t=this;$.getJSON(WWW_DIR_JAVASCRIPT+"speech/getchatdialect/"+this.chat_id,(function(i){!1===i.error?(t.chatDialect[t.chat_id]=i.dialect,t.recognition.lang=t.chatDialect[t.chat_id],t.recognition.start()):alert(i.result)}))},t.prototype.getDialect=function(t){$.get(WWW_DIR_JAVASCRIPT+"speech/getdialect/"+t.val(),(function(t){$("#id_select_dialect").replaceWith(t)}))},t.prototype.setChatLanguageRecognition=function(t){return $.postJSON(WWW_DIR_JAVASCRIPT+"speech/setchatspeechlanguage/"+t.chat_id,{select_language:$("#id_select_language").val(),select_dialect:$("#id_select_dialect").val()},(function(i){"false"==i.error&&(!1!==t.lhinst.speechHandler&&t.lhinst.speechHandler.setChatDialect(t.chat_id,i.dialect),$("#myModal").modal("hide"))})),!1},t.prototype.listen=function(t){if(!0===this.browserSupported){var e=this;if(!1!==this.chat_id&&this.chat_id!=t.chat_id?($("#CSChatMessage-"+this.chat_id).unbind("input propertychange",(function(){})),this.stopSpeech()):$("#CSChatMessage-"+t.chat_id).bind("input propertychange",(function(){e.messageSend()})),this.chat_id=t.chat_id,!1===this.recognizing){this.recognition=new webkitSpeechRecognition,this.recognition.continuous=!0,this.recognition.interimResults=!0;var s=new i({chat_id:this.chat_id,recognition:this.recognition});this.recognition.onresult=function(t){s.onresult(t)},this.recognition.onstart=function(){s.onstart()},this.recognition.onend=function(){s.onend()},this.recognition.onerror=function(t){s.onerror(t)},this.recognition.callbackHandler=s,this.recognizing=!0,null!=this.chatDialect[this.chat_id]?(this.recognition.lang=this.chatDialect[this.chat_id],this.recognition.start()):this.getChatDialectAndStart(),!1===lhinst.speechHandler&&(lhinst.speechHandler=this)}else this.stopSpeech(),lhinst.speechHandler=!1}},new t}()},549:t=>{t.exports=function(){function t(){}return t.prototype.startTranslation=function(t){t.btn.prop("disabled","disabled"),t.btn.button("loading"),jQuery.postJSON(WWW_DIR_JAVASCRIPT+"translation/starttranslation/"+t.chat_id+"/"+jQuery("#id_chat_locale_"+t.chat_id).val()+"/"+jQuery("#id_chat_locale_to_"+t.chat_id).val(),{live_translations:jQuery("#live_translations_"+t.chat_id).is(":checked"),translate_old:jQuery("#chat_auto_translate_"+t.chat_id).is(":checked")},(function(i){jQuery("#main-user-info-translation-"+t.chat_id+" > div.alert").remove(),jQuery("#main-user-info-translation-"+t.chat_id).prepend(i.result),!1===i.error?!0===i.translation_status?(jQuery("#messagesBlock-"+t.chat_id).html(""),lhinst.updateChatLastMessageID(t.chat_id,0),lhinst.syncadmincall(),jQuery(".translate-button-"+t.chat_id).addClass("btn-success")):jQuery(".translate-button-"+t.chat_id).removeClass("btn-success"):jQuery("#chat-tab-items-"+t.chat_id+' a[href="#main-user-info-translation-'+t.chat_id+'"]').tab("show"),t.btn.button("reset"),t.btn.prop("disabled","")}))},t.prototype.translateMessage=function(t){t.btn.prop("disabled","disabled"),t.btn.button("loading"),jQuery.postJSON(WWW_DIR_JAVASCRIPT+"translation/translateoperatormessage/"+t.chat_id,{msg:jQuery("#CSChatMessage-"+t.chat_id).val()},(function(i){!1===i.error?jQuery("#CSChatMessage-"+t.chat_id).val(i.msg):alert(i.msg),t.btn.button("reset"),t.btn.prop("disabled","")}))},t.prototype.translateMessageVisitor=function(t){jQuery.postJSON(WWW_DIR_JAVASCRIPT+"translation/translatevisitormessage/"+t.chat_id+"/"+t.msg_id,(function(i){0==i.error?lhinst.updateMessageRowAdmin(t.chat_id,t.msg_id):alert(i.msg)}))},new t}()},733:(t,i,e)=>{t.exports=function(){const t=new(new e(49).Recorder)({wasmURL:window.WWW_DIR_LHC_WEBPACK+"/vmsg.8c4a15f2.wasm",shimURL:"https://unpkg.com/wasm-polyfill.js@0.2.0/wasm-polyfill.js"});function i(){this.recording=null,this.audio=null,this.chat_id=null,this.isRecording=!1,this.isPlaying=!1,this.isLoading=!1,this.audioDuration=0,this.currentTime=0,this.durationInterval=null,this.playInterval=null}return i.prototype.setStateElement=function(t,i){!0===i?$("#voice-chat-"+this.chat_id+" ."+t).show():$("#voice-chat-"+this.chat_id+" ."+t).hide()},i.prototype.updateUIByState=function(){this.setStateElement("voice-start-recording",!1===this.isRecording),this.setStateElement("voice-stop-recording",!0===this.isRecording),this.setStateElement("voice-play-recording",null!==this.recording&&!1===this.isPlaying),this.setStateElement("voice-stop-play",null!==this.recording&&!0===this.isPlaying),this.setStateElement("voice-send-message",null!==this.recording),!0===this.isRecording||null!==this.recording&&!1===this.isPlaying?$("#voice-chat-"+this.chat_id+" .voice-audio-status").text(this.audioDuration+"s."):!0===this.isPlaying&&$("#voice-chat-"+this.chat_id+" .voice-audio-status").text(this.currentTime+"s.")},i.prototype.startedRecording=function(){$("#CSChatMessage-"+this.chat_id).addClass("admin-chat-mic"),$("#user-chat-status-"+this.chat_id).removeClass("icon-user").addClass("icon-mic"),$("#user-is-typing-"+this.chat_id).html("Speak now.").css("visibility","visible")},i.prototype.stoppedRecording=function(){$("#user-chat-status-"+this.chat_id).addClass("icon-user").removeClass("icon-mic"),$("#CSChatMessage-"+this.chat_id).removeClass("admin-chat-mic"),$("#user-is-typing-"+this.chat_id).html("")},i.prototype.startRecording=async function(){this.stopPlayRecord(),this.audioDuration=0,this.recording=null,this.isPlaying=!1,this.currentTime=0;try{await t.initAudio(),await t.initWorker(),t.startRecording(),this.isRecording=!0,this.startedRecording(),this.durationInterval=setInterval((()=>{this.audioDuration++,this.updateUIByState()}),1e3),this.updateUIByState()}catch(t){alert("Sorry but voice messages are not supported on your browser!")}},i.prototype.stopRecording=async function(){const i=await t.stopRecording();this.recording=i,this.audio=new Audio,this.audio.src=URL.createObjectURL(i),this.isRecording=!1,this.stoppedRecording(),clearInterval(this.durationInterval),this.updateUIByState()},i.prototype.playRecord=function(){this.audio.currentTime=0,this.audio.play(),this.isPlaying=!0,this.currentTime=0,this.playInterval=setInterval((()=>{this.currentTime=Math.round(this.audio.currentTime),(this.audio.ended||this.audio.paused)&&this.stopPlayRecord(),this.updateUIByState()}),1e3),this.updateUIByState()},i.prototype.stopPlayRecord=function(){!0===this.isPlaying&&(clearInterval(this.playInterval),this.audio.currentTime=0,this.audio.pause(),this.isPlaying=!1),this.updateUIByState()},i.prototype.prepareUIForRecording=function(){this.recording=null,this.isRecording=!1,this.isPlaying=!1,this.isLoading=!1,$("#voice-chat-"+this.chat_id+" .go-to-voice").hide(),$("#voice-chat-"+this.chat_id+" .voice-ui").html('<i class="leave-recording-ui material-icons pointer text-danger mr-0 fs25" title="Cancel">close</i> | <i class="voice-start-recording material-icons fs25 pointer text-danger mr-0" title="Start recording">fiber_manual_record</i><i style="display: none" class="voice-stop-recording material-icons fs25 pointer text-danger mr-0" title="Stop recording">stop</i><i style="display: none" class="voice-play-recording material-icons pointer text-success mr-0 fs25" title="Play recorded audio">play_arrow</i><i style="display: none" class="voice-stop-play material-icons pointer text-success mr-0 fs25" title="Stop playing recorded">stop</i><span class="voice-audio-status mr-0 fs11">0s.</span><span style="display: none;" class="ml-1 voice-send-message" > | <i class="material-icons text-success mr-0" title="Send voice message">send</i></span>');var t=this;$("#voice-chat-"+this.chat_id+" .leave-recording-ui").click((function(i){t.leaveVoiceUI(),i.preventDefault(),i.stopPropagation()})),$("#voice-chat-"+this.chat_id+" .voice-start-recording").click((function(i){t.startRecording(),i.preventDefault(),i.stopPropagation()})),$("#voice-chat-"+this.chat_id+" .voice-stop-recording").click((function(i){t.stopRecording(),i.preventDefault(),i.stopPropagation()})),$("#voice-chat-"+this.chat_id+" .voice-play-recording").click((function(i){t.playRecord(),i.preventDefault(),i.stopPropagation()})),$("#voice-chat-"+this.chat_id+" .voice-stop-play").click((function(i){t.stopPlayRecord(),i.preventDefault(),i.stopPropagation()})),$("#voice-chat-"+this.chat_id+" .voice-send-message").click((function(i){t.sendVoiceMessage(),i.preventDefault(),i.stopPropagation()}))},i.prototype.sendVoiceMessage=function(){const t=new XMLHttpRequest,i=new FormData;i.append("files[]",this.recording,"record.mp3"),t.open("POST",WWW_DIR_JAVASCRIPT+"/file/uploadfileadmin/"+this.chat_id),t.responseType="json",t.onreadystatechange=()=>{if(4==t.readyState){this.leaveVoiceUI(),lhinst.updateChatFiles(this.chat_id);var i=$("#CSChatMessage-"+this.chat_id),e=jQuery.trim(i.val());i.val(e+(""!=e?"\n":"")+t.response.msg+"\n"),i.focus(),LHCCallbacks.addFileUpload&&LHCCallbacks.addFileUpload(this.chat_id)}},t.send(i)},i.prototype.leaveVoiceUI=function(){$("#voice-chat-"+this.chat_id+" .go-to-voice").show(),$("#voice-chat-"+this.chat_id+" .voice-ui").html(""),this.isRecording&&t.stopRecording(),this.stopPlayRecord(),this.stoppedRecording(),this.recording=null,this.audio=null},i.prototype.listen=function(t){this.chat_id=t.chat_id,this.prepareUIForRecording()},new i}()},716:(t,i,e)=>{t.exports=function(){const t=new(new e(49).Recorder)({wasmURL:window.WWW_DIR_LHC_WEBPACK+"/vmsg.8c4a15f2.wasm",shimURL:"https://unpkg.com/wasm-polyfill.js@0.2.0/wasm-polyfill.js"});function i(){this.recording=null,this.audio=null,this.chat_id=null,this.hash=null,this.isRecording=!1,this.isPlaying=!1,this.isLoading=!1,this.audioDuration=0,this.currentTime=0,this.durationInterval=null,this.playInterval=null,this.initialized=!1,this.length=30}return i.prototype.setStateElement=function(t,i){!0===i?$("#voice-control-message ."+t).show():$("#voice-control-message ."+t).hide()},i.prototype.updateUIByState=function(){this.setStateElement("voice-start-recording",!1===this.isRecording),this.setStateElement("voice-stop-recording",!0===this.isRecording),this.setStateElement("voice-play-recording",null!==this.recording&&!1===this.isPlaying),this.setStateElement("voice-stop-play",null!==this.recording&&!0===this.isPlaying),this.setStateElement("voice-send-message",null!==this.recording),!0===this.isRecording||null!==this.recording&&!1===this.isPlaying?$(".voice-audio-status").text((!0===this.isRecording?this.length-this.audioDuration:this.audioDuration)+"s."):!0===this.isPlaying?$(".voice-audio-status").text(this.currentTime+"s."):$(".voice-audio-status").text("0s.")},i.prototype.startRecording=async function(){this.stopPlayRecord(),this.audioDuration=0,this.recording=null,this.isPlaying=!1,this.currentTime=0;try{await t.initAudio(),await t.initWorker(),t.startRecording(),this.isRecording=!0,this.durationInterval=setInterval((()=>{this.audioDuration++,this.audioDuration>=this.length&&this.stopRecording(),this.updateUIByState()}),1e3),this.updateUIByState()}catch(t){console.log(t),alert("Sorry but voice messages are not supported on your browser!")}},i.prototype.stopRecording=async function(){const i=await t.stopRecording();this.recording=i,this.audio=new Audio,this.audio.src=URL.createObjectURL(i),this.isRecording=!1,clearInterval(this.durationInterval),this.updateUIByState()},i.prototype.playRecord=function(){this.audio.currentTime=0,this.audio.play(),this.isPlaying=!0,this.currentTime=0,this.playInterval=setInterval((()=>{this.currentTime=Math.round(this.audio.currentTime),(this.audio.ended||this.audio.paused)&&this.stopPlayRecord(),this.updateUIByState()}),1e3),this.updateUIByState()},i.prototype.stopPlayRecord=function(){!0===this.isPlaying&&(clearInterval(this.playInterval),this.audio.currentTime=0,this.audio.pause(),this.isPlaying=!1),this.updateUIByState()},i.prototype.prepareUIForRecording=function(){this.recording=null,this.isRecording=!1,this.isPlaying=!1,this.isLoading=!1,this.audioDuration=0,this.currentTime=0,$("#lhc-mic-icon").hide(),$("#voice-control-message").show(),this.updateUIByState();var t=this;!1===this.initialized&&(this.initialized=!0,$("#voice-control-message .leave-recording-ui").click((function(i){t.leaveVoiceUI(),i.preventDefault(),i.stopPropagation()})),$("#voice-control-message .voice-start-recording").click((function(i){t.startRecording(),i.preventDefault(),i.stopPropagation()})),$("#voice-control-message .voice-stop-recording").click((function(i){t.stopRecording(),i.preventDefault(),i.stopPropagation()})),$("#voice-control-message .voice-play-recording").click((function(i){t.playRecord(),i.preventDefault(),i.stopPropagation()})),$("#voice-control-message .voice-stop-play").click((function(i){t.stopPlayRecord(),i.preventDefault(),i.stopPropagation()})),$("#voice-control-message .voice-send-message").click((function(i){t.sendVoiceMessage(),i.preventDefault(),i.stopPropagation()})))},i.prototype.sendVoiceMessage=function(){const t=new XMLHttpRequest,i=new FormData;i.append("files",this.recording,"record.mp3"),t.open("POST",WWW_DIR_JAVASCRIPT+"/file/uploadfile/"+this.chat_id+"/"+this.hash),t.upload.addEventListener("load",(t=>{this.leaveVoiceUI(),lhinst.syncusercall()})),t.send(i)},i.prototype.leaveVoiceUI=function(){$("#lhc-mic-icon").show(),$("#voice-control-message").hide(),this.isRecording&&t.stopRecording(),this.stopPlayRecord(),this.recording=null,this.audio=null},i.prototype.listen=function(t){this.chat_id=t.chat_id,this.hash=t.hash,this.length=t.length,this.prepareUIForRecording()},new i}()},482:(t,i,e)=>{var s={"./lhc.speak.js":685,"./lhc.translation.js":549,"./lhc.voice.js":733,"./lhc.voicevisitor.js":716};function a(t){var i=o(t);return e(i)}function o(t){if(!e.o(s,t)){var i=new Error("Cannot find module '"+t+"'");throw i.code="MODULE_NOT_FOUND",i}return s[t]}a.keys=function(){return Object.keys(s)},a.resolve=o,t.exports=a,a.id=482}}]);