import { Link } from 'react-router';
import { Crown, Star, Gift } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Badge as UIBadge } from '../components/ui/badge';
import { Button } from '../components/ui/button';
import { useEffect, useState } from 'react';

export function MembershipClassifications() {
  const [heroVisible, setHeroVisible] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const classifications = [
    {
      icon: Star,
      title: 'Bronze Member',
      shareCapital: '₱500 - ₱2,500',
      gradient: 'from-amber-600 to-amber-700',
      benefits: [
        'All regular member benefits',
        'Standard loan limits',
        'Basic financial counseling',
        'Access to all savings products',
        'Member education seminars',
      ]
    },
    {
      icon: Gift,
      title: 'Silver Member',
      shareCapital: '₱2,501 - ₱10,000',
      gradient: 'from-gray-400 to-gray-500',
      benefits: [
        'All Bronze benefits',
        'Increased loan limits (20% higher)',
        'Priority customer service',
        'Preferential interest rates',
        'Free financial planning session (1x/year)',
        'Special promotional offers',
      ]
    },
    {
      icon: Crown,
      title: 'Gold Member',
      shareCapital: '₱10,001 and above',
      gradient: 'from-yellow-500 to-yellow-600',
      benefits: [
        'All Silver benefits',
        'Maximum loan limits (40% higher)',
        'VIP customer service',
        'Best interest rates',
        'Quarterly financial planning sessions',
        'Exclusive investment opportunities',
        'Additional dividend bonuses',
        'Complimentary insurance coverage',
      ]
    },
  ];

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <UIBadge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Member Benefits</UIBadge>
          <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Membership Classifications</h1>
          <p className="text-xl text-blue-100 leading-relaxed">
            Unlock greater benefits as you grow your share capital investment
          </p>
        </div>
      </section>

      {/* ── Tiers ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {classifications.map((tier, index) => (
              <Card key={index} className="rounded-2xl border-border/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-card/90 backdrop-blur-sm">
                <CardHeader>
                  <div className={`w-16 h-16 rounded-xl bg-gradient-to-br ${tier.gradient} flex items-center justify-center mb-4 shadow-lg`}>
                    <tier.icon className="w-8 h-8 text-white" />
                  </div>
                  <CardTitle className="text-2xl">{tier.title}</CardTitle>
                  <p className="text-sm text-muted-foreground">Share Capital: {tier.shareCapital}</p>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="space-y-2">
                    {tier.benefits.map((benefit, idx) => (
                      <div key={idx} className="flex items-start gap-2 text-sm">
                        <span className="text-primary mt-0.5 font-bold">✓</span>
                        <span className="text-muted-foreground">{benefit}</span>
                      </div>
                    ))}
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── CTA ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 className="text-3xl sm:text-4xl font-bold mb-4 text-white">Ready to Upgrade?</h2>
          <p className="text-xl text-white/75 mb-10 leading-relaxed">
            Increase your share capital contribution to unlock higher benefits and better rates
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button asChild size="lg" className="bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold">
              <Link to="/contact">Contact Us</Link>
            </Button>
            <Button asChild size="lg" variant="outline" className="cta-btn-primary bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold px-8">
              <Link to="/membership/apply">Apply Now</Link>
            </Button>
          </div>
        </div>
      </section>

    </div>
  );
}