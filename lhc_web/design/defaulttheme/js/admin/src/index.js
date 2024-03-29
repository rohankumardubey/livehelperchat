import React from 'react';
import ReactDOM from 'react-dom';
import { Suspense, lazy } from 'react';
import i18n from "./components/i18n/i18n";

const CannedMessages = React.lazy(() => import('./components/CannedMessages'));
const MailChat = React.lazy(() => import('./components/MailChat'));
const DashboardChatTabs = React.lazy(() => import('./components/DashboardChatTabs'));
const GroupChat = React.lazy(() => import('./components/GroupChat'));

// set webpack loading path
__webpack_public_path__ = WWW_DIR_LHC_WEBPACK_ADMIN;

ee.addListener('adminChatLoaded',(chatId) => {
    var el = document.getElementById('canned-messages-chat-container-'+chatId);

    if (el !== null) {
        ReactDOM.render(
            <Suspense fallback="..."><CannedMessages chatId={chatId}/></Suspense>,
            el
        );
    }
})

ee.addListener('groupChatTabLoaded',(chatId) => {
    var el = document.getElementById('chat-id-'+chatId);
    if (el !== null) {
        chatId = chatId.replace('gc','');
        ReactDOM.render(
            <Suspense fallback="..."><GroupChat chatId={chatId} userId={confLH.user_id} /></Suspense>,
            el
        );
    }
})

ee.addListener('mailChatTabLoaded',(chatId, modeChat, disableRemember, keyword) => {
    modeChat = (typeof modeChat != 'undefined' ? modeChat : '');
    disableRemember = (typeof disableRemember != 'undefined' ? disableRemember : false);
    keyword = (typeof keyword != 'undefined' ? keyword : []);
    var el = document.getElementById('chat-id-' + modeChat + chatId);
    if (el !== null) {
        chatId = chatId.replace('mc','');
        ReactDOM.render(
            <Suspense fallback="..."><MailChat chatId={chatId} keyword={keyword} userId={confLH.user_id} mode={modeChat} disableRemember={disableRemember} /></Suspense>,
            el
        );
    }
})

ee.addListener('privateChatStart',(chatId, params) => {
    var el = document.getElementById('private-chat-tab-root-'+chatId);
    if (el !== null) {
        ReactDOM.render(
            <Suspense fallback="..."><GroupChat paramsStart={params || {}} chatPublicId={chatId} userId={confLH.user_id} /></Suspense>,
            el
        );
    }
})

ee.addListener('unloadGroupChat', (chatId) => {
    var el = document.getElementById('chat-id-'+chatId);
    if (el !== null) {
        ReactDOM.unmountComponentAtNode(el)
    }
});


ee.addListener('unloadMailChat', (chatId, modeChat) => {
    modeChat = (typeof modeChat != 'undefined' ? modeChat : '');
    var el = document.getElementById('chat-id-'+modeChat+chatId);
    if (el !== null) {
        ReactDOM.unmountComponentAtNode(el)
    }
});

ee.addListener('removeSynchroChat', (chatId) => {
    // Canned messages component
    var el = document.getElementById('canned-messages-chat-container-'+chatId);
    if (el !== null) {
        ReactDOM.unmountComponentAtNode(el)
    }
    // Private chat component
    el = document.getElementById('private-chat-tab-root-'+chatId);
    if (el !== null) {
        ReactDOM.unmountComponentAtNode(el)
    }
});


$(document).ready(function(){
    var el = document.getElementById('tabs-dashboard');
    var elOrderMode = document.getElementById('chats-order-mode');
    var elOrder = elOrderMode && elOrderMode.getAttribute('data-mode');

    if (el !== null) {
        ReactDOM.render(
            <Suspense fallback="..."><DashboardChatTabs static_order={elOrder == 'static'} /></Suspense>,
            el
        );
    }

    try {
        if (localStorage) {
                var achat_id_array = [];
                var achat_id = localStorage.getItem('gachat_id');

                if (achat_id !== null && achat_id !== '') {
                    achat_id_array = achat_id.split(',');
                    achat_id_array.forEach((chatId) => {
                        if ($('#tabs').length > 0) {
                            return lhinst.startGroupChat(chatId, $('#tabs'), LiveHelperChatFactory.truncate(name,10), true);
                        }
                    });
                }
        }
    } catch(e) {

    }
});