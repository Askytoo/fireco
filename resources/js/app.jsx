import './bootstrap';
import '../css/app.css';

import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        // https://blog.capilano-fw.com/?p=11314
        // ヘルパー関数を登録
        window.__ = window.trans = (key = null, replace = {}, locale = null) => {
            const {currentLocale, localeData} = props.initialPage.props.locale;
            if(locale === null) {
                locale = currentLocale;
            }
            let translatedText = localeData[locale][key] || key;
            for(let key in replace) {
                const replacingValue = replace[key];
                translatedText = translatedText.replace(`:${key}`, replacingValue);
            }
            return translatedText;
        };

        /**
         * 日付の時刻を切り捨てる(00:00:00にする)
         * https://propg.ee-mall.info/%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0/javascript/typescript-%E6%97%A5%E4%BB%98%E3%81%AE%E6%99%82%E5%88%86%E7%A7%92%E9%83%A8%E5%88%86%E3%82%92%E5%88%87%E3%82%8A%E6%8D%A8%E3%81%A6%E3%82%8B/
         * @param date 対象日付
         * @return Date
         */
        {/* const truncateDate = (date) => {;
            if (date) {
                return new Date(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes());
            }
            return date;
        }; */}

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
