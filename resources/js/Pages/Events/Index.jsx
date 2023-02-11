import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Event from '@/Components/Events/Index';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth, events }) {
    return (
        <AuthenticatedLayout auth={auth}>
            <Head title="Events" />
            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <div className="mt-6 bg-white shadow-sm rounded-lg divide-y">
                    {events.map(event =>
                        <Event key={event.id} event={event} />
                    )}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
