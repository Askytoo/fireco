export default function Index(props) {

    const userName = '山田太郎';
    const hours = new Date().getHours();
    const minutes = new Date().getMinutes();
    const locales = ['ja', 'en', 'zh'];
    const handleChangeLocale = locale => {

        location.href = '?locale='+ locale;

    };

    return (
        <div className="p-5">
            <div className="bg-gray-200 p-2 mb-5">
                { __('Hi, :user_name, It is now :hours::minutes.', {
                    user_name: userName,
                    hours: hours,
                    minutes: minutes,
                }) }
            </div>

            Language<br />
            <select onChange={e => handleChangeLocale(e.target.value)}>
                <option value=""></option>
                {locales.map(locale => (
                    <option key={locale} value={locale}>{locale}</option>
                ))}
            </select>
        </div>
    );

}
